<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Middleware\RedirectMiddleware;
use App\Http\Middleware\UserLoginMiddeware;
use App\Http\Middleware\UserRedirectMiddeware;
use App\Models\Main\KeyValue;
use Illuminate\Support\Facades\Route;

//Index:
Route::get('/', [IndexController::class, "index"])->name('index.index');

Route::post('/sendMessage', [IndexController::class, "sendMessage"])->name('index.sendMessage');

Route::get('/blogs', [IndexController::class, "blogs"])->name('index.blogs');

Route::get('/p/{pageCode}', [IndexController::class, "blog_detail"])->name('index.blog.detail');

Route::get('/products', [IndexController::class, "products"])->name('index.products');

Route::get('/product/{pageCode}', [IndexController::class, "product_detail"])->name('index.product.detail');

Route::get('/contact', [IndexController::class, "contact"])->name('index.contact');



//User:
Route::middleware([UserRedirectMiddeware::class])->group(function () {
    Route::get('/login', [UserUserController::class, "loginScreen"])->name('user.login');
    Route::post('/login', [UserUserController::class, "login"])->name('user.login.post');
    Route::get('/register', [UserUserController::class, "registerScreen"])->name('user.login');
});


Route::middleware([UserLoginMiddeware::class])->group(function () {
    Route::get('/user', [UserUserController::class, "index"])->name('user.user');
    Route::get('/logout', [UserUserController::class, "logout"])->name('user.logout');
});




//Admin:
Route::any('/admin/{params?}', [AdminController::class, "admin"])->where('params', '.*')->middleware(RedirectMiddleware::class)->name('admin_page');

Route::get('assets/{folder}/{filename}', [MainController::class, 'assetFile'])->where('folder', '.*')->name('assetFile');


//Default 404:
Route::get('/not-found', function () {
    return view('errors.404');
})->name('error.404');


//ChangeLanguage
Route::get('setActiveLang/{locale}', function ($locale) {
    $result = setActiveLang($locale);
    if ($result) return redirect()->back()->with('success', 'Language changed successfully');
    return redirect()->back()->with('success', 'An error occurred while changing the language');
})->name('Translation.setActiveLang');
