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

Route::get('/product/single/{id}', 'FrontEndController@singleProduct')->name('product.single');
Route::get('/', 'FrontEndController@index')->name('index');

Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');
Route::get('/cart/inc/{id}/{qty}', 'ShoppingController@cart_inc')->name('cart.inc');
Route::get('/cart/dec/{id}/{qty}', 'ShoppingController@cart_dec')->name('cart.dec');
Route::get('/cart/rapid/add/{id}', 'ShoppingController@rapid_add')->name('cart.rapid.add');
Route::get('/cart/checkout', 'CheckoutController@index')->name('checkout');






Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::resource('products', 'ProductsController');


