<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Orders';
        return view('user.order', compact('title'));
    }

    public function orderDetail() {}

    public function addOrder() {}

    public function cancelOrder() {}
}
