<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Main\Cart;
use App\Models\Main\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
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
}
