<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\ShopController;
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

Route::prefix('/admin')->group(function(){
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
    Route::post('/login/store', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login.store');
});

Route::get('/admin', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::middleware(['auth'])->group(function (){
    Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
});

// Hien thi user
Route::prefix('/user-manage')->group(function(){
    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::get('/user-create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('/user-create', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
});
// Hien thi admin
Route::prefix('/admin-manage')->group(function(){
    Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/admin-create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin-create', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}/edit', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}/edit', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('admin.destroy');
});
// Hien thi category
Route::prefix('/category-manage')->group(function(){
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::get('/category-create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-create', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');
});
//Hien thi product
Route::prefix('/product-manage')->group(function(){
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('/product-create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product.create');
    Route::post('/customer-create', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/edit', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product.destroy');
});

//Hien thi order
Route::prefix('/order-manage')->group(function(){
    Route::get('/order', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order');
    Route::put('/order/{order}/check', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('order.update');
    Route::get('/view/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('order.detail');

    Route::get('/revenue/day', [\App\Http\Controllers\Admin\OrderController::class, 'dayRevenue'])->name('revenue.day');
    Route::get('detail-day-revenue/{date}', [\App\Http\Controllers\Admin\OrderController::class, 'dayOrderDetail'])->name('revenue.dayDetail');
    Route::get('/revenue/month', [\App\Http\Controllers\Admin\OrderController::class, 'monthRevenue'])->name('revenue.month');
    Route::get('detail-month-revenue/{date}', [\App\Http\Controllers\Admin\OrderController::class, 'monthOrderDetail'])->name('revenue.monthDetail');
});

Route::prefix('/home')->group(function(){
    Route::get('/login', [\App\Http\Controllers\User\LoginController::class, 'index'])->name('user.login');
    Route::post('/login/store', [\App\Http\Controllers\User\LoginController::class, 'login'])->name('user.login.store');
    Route::get('/register', [\App\Http\Controllers\User\RegisterController::class, 'index'])->name('user.register');
    Route::post('/register-user', [\App\Http\Controllers\User\RegisterController::class, 'register'])->name('register.store');
    // Route::get('/cart', [CartController::class, 'index'])->name('home.cart');
    Route::get('/shop', [\App\Http\Controllers\User\ShopController::class, 'index'])->name('home.shop');
    Route::get('/product/{id}', [\App\Http\Controllers\User\ProductController::class, 'show'])->name('home.product');
    Route::get('/search', [SearchController::class, 'index'])->name('home.search');
    Route::get('/contact', [\App\Http\Controllers\User\ContactController::class, 'index'])->name('home.contact');
    Route::get('/introduce', [\App\Http\Controllers\User\IntroduceController::class, 'index'])->name('home.introduce');
    Route::get('/category/{id}', [\App\Http\Controllers\User\CategoryController::class, 'show'])->name('home.category');


    Route::prefix('/sort')->group(function(){
        Route::get('/Popularity', [ShopController::class, 'sortPopularity'])->name('sort.popularity');
        Route::get('/LowToHight', [ShopController::class, 'sortByPriceLowToHigh'])->name('price.asc');
        Route::get('/HightToLow', [ShopController::class, 'sortByPriceHightToLow'])->name('price.desc');
        Route::get('/Price1', [ShopController::class, 'sortByPriceFirst'])->name('price.first');
        Route::get('/Price2', [ShopController::class, 'sortByPriceSecond'])->name('price.second');
        Route::get('/Price3', [ShopController::class, 'sortByPriceThird'])->name('price.third');
        Route::get('/color/black', [ShopController::class, 'sortByBlack'])->name('color.black');
        Route::get('/color/white', [ShopController::class, 'sortByWhite'])->name('color.white');
        Route::get('/color/blue', [ShopController::class, 'sortByBlue'])->name('color.blue');
    });
});

// Home
Route::get('/home', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

#cart
// Route::prefix('/cart')->group(function (){
//     Route::post('/add-cart', [App\Http\Controllers\CartController::class, 'index']);
//     Route::get('/carts', [App\Http\Controllers\CartController::class, 'show'])->name('shop.cart');
//     Route::post('/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
//     Route::get('/carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.delete');
//     Route::post('/carts', [App\Http\Controllers\CartController::class, 'addCart'])->name('add-cart');
// });


Route::middleware(['auth'])->group(function (){
    Route::get('/cart', [\App\Http\Controllers\User\CartController::class, 'viewCart'])->name('home.cart');
    Route::post('add-cart', [\App\Http\Controllers\User\CartController::class, 'addProduct']);
    Route::get('/delete-cart-item/{id}', [\App\Http\Controllers\User\CartController::class, 'deleteProduct']);
    Route::post('/update-cart', [\App\Http\Controllers\User\CartController::class, 'updateCart']);
    Route::post('/carts', [\App\Http\Controllers\User\CartController::class, 'addCart']);
    Route::get('/history', [\App\Http\Controllers\User\HistoryController::class, 'index'])->name('home.history');
    Route::get('/detail/{order}', [\App\Http\Controllers\User\HistoryController::class, 'show']);
    Route::put('/history/{order}', [\App\Http\Controllers\User\HistoryController::class, 'update'])->name('history.update');
});