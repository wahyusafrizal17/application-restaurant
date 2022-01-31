<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::post('category/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');
    Route::resource('category', App\Http\Controllers\CategoryController::class);

    Route::post('card/delete', [App\Http\Controllers\CardController::class, 'delete'])->name('card.delete');
    Route::resource('card', App\Http\Controllers\CardController::class);

    Route::post('product/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');
    Route::resource('product', App\Http\Controllers\ProductController::class);

    Route::resource('setting', App\Http\Controllers\SettingController::class);
    Route::resource('tax', App\Http\Controllers\TaxController::class);

    Route::get('order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::post('order/detail', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
    Route::post('order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('order/{inv}/cetak', [App\Http\Controllers\OrderController::class, 'cetak'])->name('order.cetak');
    Route::get('order/{inv}/print', [App\Http\Controllers\OrderController::class, 'print'])->name('order.print');

    Route::post('cart', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::post('cart/store', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');

    Route::get('report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
