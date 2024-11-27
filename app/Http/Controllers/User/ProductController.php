<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Main\Files;
use App\Models\Main\KeyValue;
use App\Models\Main\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productCode = null)
    {
        if (!$productCode) {
            $title = 'Products';
            $showproductCount = 20;

            $products = Product::select('products.*', 'files.file', 'key_values.value as priceTypeValue') // İhtiyaç duyduğunuz sütunları seçin
                ->leftJoin('files', function ($join) {
                    $join->on('files.type_code', '=', 'products.code')
                        ->where('files.delete', '=', 0); // `files` tablosunda `delete` değeri 0 olanları al
                })
                ->leftJoin('key_values', function ($join) {
                    $join->on('key_values.code', '=', 'products.priceType')
                        ->where('key_values.delete', '=', 0); // `files` tablosunda `delete` değeri 0 olanları al
                })
                ->groupBy('products.id') // Her bir ürün için tek bir satır döndür
                ->paginate(20);

            return view('user.product', compact('title', 'products'));
        } else {
            $title = 'Products';
            $product = Product::select('products.*', 'key_values.value as priceTypeValue')
                ->leftJoin('key_values', function ($join) {
                    $join->on('key_values.code', '=', 'products.priceType')->where('key_values.delete', '=', 0);
                })
                ->Where('products.delete', 0)
                ->Where('short_name', $productCode)
                ->first();
            if (!$product) abort('404');

            $files = Files::Where('type', 'product')->where('delete', 0)->where('type_code', $product->code)->get();
            $category = KeyValue::Where('key', 'categories')->where('code', $product->category)->first();
            $cargo_company = KeyValue::Where('key', 'cargo_companies')->where('code', $product->cargo_company)->first();
            return view('user.product_detail', compact('title', 'product', 'files', 'category', 'cargo_company'));
        }
    }

    public function productDetail() {}

    public function addBasket() {}
}
