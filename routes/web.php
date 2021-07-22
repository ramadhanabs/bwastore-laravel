<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class,'detail'])->name('categories-detail');

Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('checkout-callback');

Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');

Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('details');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('details-add');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductsController::class, 'index'])->name('dashboard-products');
    Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductsController::class, 'create'])->name('dashboard-product-create');
    Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductsController::class, 'detail'])->name('dashboard-product-details');

    Route::get('/dashboard/transaction', [App\Http\Controllers\DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    Route::get('/dashboard/transaction/detail', [App\Http\Controllers\DashboardTransactionController::class, 'detail'])->name('dashboard-transaction-detail');

    Route::get('/dashboard/setting', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-store-setting');
    Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-account-setting');

    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register');
    Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');
});

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('user',App\Http\Controllers\Admin\UserController::class);
        Route::resource('product',App\Http\Controllers\Admin\ProductController::class);
        Route::resource('product-gallery',App\Http\Controllers\Admin\ProductGalleryController::class);

    });

Auth::routes();
