<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
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

//Route::get('/', 'Frontend\HomeController@showHomePage');

Route::group(['namespace' => 'Frontend'],function (){
    Route::get('/', [HomeController::class, 'showHomePage'])->name('frontend.home');

    Route::get('/product/{slug}', [ProductController::class, 'showDetails'])->name('frontend.product.details');

    Route::get('/cart', [CartController::class, 'showCart'])->name('frontend.cart.show');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('frontend.cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('frontend.cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('frontend.cart.clear');

});
