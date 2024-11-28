<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Main\Cart;
use App\Models\Main\KeyValue;
use App\Models\Main\Order;
use App\Models\Main\OrderProduct;
use App\Models\Main\Product;
use App\Models\Main\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $mainController;

    public function __construct()
    {
        $this->mainController = new MainController();
    }
    public function index()
    {
        $title = 'Cart';

        $carts = DB::table('carts')
            ->join('products', 'carts.product_code', '=', 'products.code')
            ->leftJoin('files', function ($join) {
                $join->on('products.code', '=', 'files.type_code')
                    ->whereRaw('files.id = (SELECT MIN(id) FROM files WHERE files.type_code = products.code)');
            })
            ->select(
                'carts.user_code',
                'carts.product_code',
                'carts.product_count',
                'products.title',
                'products.price_without_vat',
                'products.priceType_without_vat',
                'products.price',
                'products.priceType',
                'products.cargo_price',
                'products.cargo_priceType',
                'products.stock',
                'files.file AS image'
            )
            ->where('carts.user_code', Auth::user()->code)
            ->get();

        return view('user.cart', compact('title', 'carts'));
    }

    public function addCart(Request $request)
    {
        $userCode = Auth::user()->code;
        $productCode = $request->product_code;

        // Ürün ve kart verilerini bir kez sorgula
        $product = Product::where('code', $productCode)->first();
        $card = Cart::where('user_code', $userCode)->where('product_code', $productCode)->first();

        // Ürün yoksa hata döndür
        if (!$product) {
            return redirect()->back()->with('error', 'An error occurred');
        }

        // Sepet kartı mevcutsa işlemleri güncelle
        if ($card) {
            if ($request->minus) {
                // Ürün sayısı 1 ise kartı sil
                if ($card->product_count == '1') {
                    $card->delete();
                    return redirect()->back()->with('success', 'Removed from cart');
                }

                // Ürün sayısını azalt
                $card->product_count = (int)$card->product_count - 1;
            } else if ($request->remove_all) {
                $card->delete();
                return redirect()->back()->with('success', 'Removed from cart');
            } else {
                // Stok kontrolü
                if ((int)$product->stock <= (int)$card->product_count) {
                    return redirect()->back()->with('error', 'Out of stock');
                }

                // Ürün sayısını artır
                $card->product_count = (int)$card->product_count + 1;
            }
        } else {
            // Yeni kart ekle
            if ((int)$product->stock < 1) {
                return redirect()->back()->with('error', 'Out of stock');
            }

            $card = new Cart();
            $card->user_code = Auth::user()->code;
            $card->product_code = $request->product_code;
            $card->product_count = '1';
        }

        // Kartı kaydet
        $card->save();

        return redirect()->back()->with('success', $request->minus ? 'Removed from cart' : 'Added to cart');
    }

    public function checkoutScreen()
    {
        $title = 'Checkout';
        $carts = DB::table('carts')
            ->join('products', 'carts.product_code', '=', 'products.code')
            ->leftJoin('files', function ($join) {
                $join->on('products.code', '=', 'files.type_code')
                    ->whereRaw('files.id = (SELECT MIN(id) FROM files WHERE files.type_code = products.code)');
            })
            ->select(
                'carts.user_code',
                'carts.product_code',
                'carts.product_count',
                'products.title',
                'products.price_without_vat',
                'products.priceType_without_vat',
                'products.price',
                'products.priceType',
                'products.cargo_price',
                'products.cargo_priceType',
                'products.stock',
                'files.file AS image'
            )
            ->where('carts.user_code', Auth::user()->code)
            ->get();

        $total_price = 0;
        $vat = 0;
        $price_without_vat = 0;
        $cargo_price = 0;
        $priceSymbol = '₺';
        foreach ($carts as $cart) {
            if ($cart->priceType == 'TRY') {
                $priceSymbol = '₺';
            } elseif ($cart->priceType == 'EUR') {
                $priceSymbol = '€';
            } else {
                $priceSymbol = '$';
            }
            $stock = (int)$cart->stock > (int)$cart->product_count ? (int)$cart->product_count : (int)$cart->stock;
            $price_without_vat += (int)$cart->price_without_vat * $stock;
            $vat += ((int)$cart->price - (int)$cart->price_without_vat) * $stock;
            $total_price += (int) $cart->price * $stock;
            $cargo_price += (int) $cart->cargo_price * $stock;
        }

        $addresses = UserAddress::Where('user_code', Auth::user()->code)->where('delete', 0)->get();

        $payment_methods = KeyValue::Where('key', 'payment_methods')->where('optional_1', '1')->get();

        $iban_informations = KeyValue::Where('key', 'iban_informations')->where('delete', 0)->get();

        return view('user.checkout', compact('title', 'total_price', 'vat', 'price_without_vat', 'cargo_price', 'addresses', 'payment_methods', 'iban_informations'));
    }

    public function checkout(Request $request)
    {
        $order = new Order();
        $order->code = $this->mainController->generateUniqueCode(['table' => 'orders']);
        $order->user_code = Auth::user()->code;
        $order_code = $this->mainController->generateUniqueCode(['table' => 'orders', 'length' => '20']);
        $order->order_code = $order_code;
        $order->payment_method = $request->paymentMethod;
        $order->address_code = $request->address;

        if ($request->hasFile('receipt')) {
            $file = $request->file('receipt');

            $path = public_path('files/order/receipt');
            $name = $order_code . "_" . $this->mainController->generateUniqueCode() . "." . $file->getClientOriginalExtension();
            $file->move($path, $name);
            $order->receipt_file = "files/order/receipt/" . $name;
        }

        $carts = DB::table('carts')
            ->join('products', 'carts.product_code', '=', 'products.code')
            ->leftJoin('files', function ($join) {
                $join->on('products.code', '=', 'files.type_code')
                    ->whereRaw('files.id = (SELECT MIN(id) FROM files WHERE files.type_code = products.code)');
            })
            ->select(
                'carts.id',
                'carts.user_code',
                'carts.product_code',
                'carts.product_count',
                'products.title',
                'products.price_without_vat',
                'products.priceType_without_vat',
                'products.price',
                'products.priceType',
                'products.cargo_price',
                'products.cargo_priceType',
                'products.stock',
                'files.file AS image'
            )
            ->where('carts.user_code', Auth::user()->code)
            ->get();

        $total_price = 0;
        $vat = 0;
        $price_without_vat = 0;
        $cargo_price = 0;
        $priceSymbol = '₺';
        foreach ($carts as $cart) {
            if ($cart->priceType == 'TRY') {
                $priceSymbol = '₺';
            } elseif ($cart->priceType == 'EUR') {
                $priceSymbol = '€';
            } else {
                $priceSymbol = '$';
            }
            $stock = (int)$cart->stock > (int)$cart->product_count ? (int)$cart->product_count : (int)$cart->stock;
            $price_without_vat += (int)$cart->price_without_vat * $stock;
            $vat += ((int)$cart->price - (int)$cart->price_without_vat) * $stock;
            $total_price += (int) $cart->price * $stock;
            $cargo_price += (int) $cart->cargo_price * $stock;

            $orderProduct = new OrderProduct();
            $orderProduct->order_code = $order_code;
            $orderProduct->product_code = $cart->product_code;
            $orderProduct->product_count = $cart->product_count;
            $orderProduct->total_product_price = $cart->price;
            $orderProduct->total_product_price_type = $cart->price;
            $orderProduct->save();

            Cart::Where('id', $cart->id)->delete();
        }

        $order->price = $total_price;
        $order->price_without_vat = $price_without_vat;
        $order->cargo_price = $cargo_price;
        $order->status = 1;
        $order->save();

        return redirect()->route('user.checkout.success', ['order_code' => $order_code]);
    }

    public function checkoutSuccess($order_code)
    {
        $title = 'Checkout';
        $formattedDate = Carbon::now()->locale('tr')->translatedFormat('d F Y, H:i');
        return view('user.checkoutSuccess', compact('title', 'order_code', 'formattedDate'));
    }
}
