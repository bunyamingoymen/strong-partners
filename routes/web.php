<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\RedirectMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::any('/admin/{params?}', [AdminController::class, "admin"])->where('params', '.*')->middleware(RedirectMiddleware::class);
