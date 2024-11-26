<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\RedirectMiddleware;
use App\Models\Main\KeyValue;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, "index"])->name('index.index');

Route::post('/sendMessage', [IndexController::class, "sendMessage"])->name('index.sendMessage');

Route::get('/blogs', [IndexController::class, "blogs"])->name('index.blogs');

Route::get('/p/{pageCode}', [IndexController::class, "blog_detail"])->name('index.blog.detail');

Route::get('/contact', [IndexController::class, "contact"])->name('index.contact');

Route::any('/admin/{params?}', [AdminController::class, "admin"])->where('params', '.*')->middleware(RedirectMiddleware::class)->name('admin_page');

Route::get('assets/{folder}/{filename}', [MainController::class, 'assetFile'])->where('folder', '.*')->name('assetFile');

Route::get('/not-found', function () {
    return view('errors.404');
})->name('error.404');

Route::get('setActiveLang/{locale}', function ($locale) {
    $result = setActiveLang($locale);
    if ($result) return redirect()->back()->with('success', 'Language changed successfully');
    return redirect()->back()->with('success', 'An error occurred while changing the language');
})->name('Translation.setActiveLang');
