<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->join('order_products', 'orders.order_code', '=', 'order_products.order_code')
            ->join('products', 'order_products.product_code', '=', 'products.code')
            ->leftJoin('files', function ($join) {
                $join->on('products.code', '=', 'files.type_code')
                    ->whereRaw('files.id = (SELECT MIN(id) FROM files WHERE files.type_code = products.code)');
            })
            ->select(
                'orders.order_code',
                'orders.created_at as order_date',
                'products.code as product_code',
                'products.title as product_title',
                'files.file as first_image'
            )
            ->orderBy('orders.created_at', 'desc') // Sipariş sıralaması
            ->get()
            ->groupBy('order_code'); // Siparişe göre grupla

        $formattedOrders = $orders->map(function ($group, $orderCode) {
            // Her sipariş için düzenleme
            return [
                'order_code' => $orderCode,
                'order_date' => $group->first()->order_date,
                'products' => $group->map(function ($product) {
                    // Her ürün için düzenleme
                    return [
                        'product_code' => $product->product_code,
                        'product_title' => $product->product_title,
                        'first_image' => $product->first_image ?? null,
                    ];
                })->toArray(),
            ];
        })->values(); // Grupları düz listeye çevir

        dd($formattedOrders);

        $title = 'Orders';
        return view('user.order', compact('title', 'formattedOrders'));
    }
}
