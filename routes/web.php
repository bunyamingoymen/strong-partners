<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\RedirectMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.index');
});


Route::any('/admin/{params?}', [AdminController::class, "admin"])->where('params', '.*')->middleware(RedirectMiddleware::class)->name('admin_page');

Route::get('assets/{folder}/{filename}', [MainController::class, 'assetFile'])->where('folder', '.*')->name('assetFile');

Route::get('setActiveLang/{locale}', function ($locale) {
    $result = setActiveLang($locale);
    if ($result) return redirect()->back()->with('success', 'Language changed successfully');
    return redirect()->back()->with('success', 'An error occurred while changing the language');
})->name('Translation.setActiveLang');
