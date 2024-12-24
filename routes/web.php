<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBroadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/singup', [UserController::class, 'singup'])->name('singup');
Route::post('/singup', [UserController::class, 'postSingup']);
Route::get('/gioithieu', [HomeController::class, 'about'])->name('about');
Route::get('/nam', [HomeController::class, 'nam'])->name('nam');
Route::get('/nu', [HomeController::class, 'nu'])->name('nu');
Route::get('/treem', [HomeController::class, 'treem'])->name('treem');
Route::get('/phukien', [HomeController::class, 'dmphukien'])->name('dmphukien');
Route::get('/tintuc', [HomeController::class, 'tintuc'])->name('tintuc');
Route::get('/lienhe', [HomeController::class, 'lienhe'])->name('lienhe');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');




Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postLogon'])->name('admin.logon');

Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/', [DashBroadController::class, 'index'])->name('admin.index');
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{id}/update', [OrderController::class, 'update'])->name('admin.orders.update');
});

Route::post('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');
Route::get('/thank-you', [CartController::class, 'thankYou'])->name('cart.thankYou');
