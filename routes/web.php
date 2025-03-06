<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/contact', 'App\Http\Controllers\ContactController@show')->name('contact.show');
// Taller 1 - Clase Orders
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
Route::get('/orders/list', 'App\Http\Controllers\OrderController@list')->name('order.list');
Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('order.save');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
Route::get('/orders/{id}/delete', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
// Tutorial3
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');
Route::get('/image', 'App\Http\Controllers\ImageController@index')->name('image.index');
Route::post('/image/save', 'App\Http\Controllers\ImageController@save')->name('image.save');
// item
Route::get('/cart2', 'App\Http\Controllers\Cart2Controller@index')->name('cart2.index');
Route::get('/cart2/delete/', 'App\Http\Controllers\Cart2Controller@delete')->name('cart2.delete');
Route::post('/cart2/add/{id}', 'App\Http\Controllers\Cart2Controller@add')->name('cart2.add');
// purchase
Route::get('/cart/purchase', 'App\Http\Controllers\Cart2Controller@purchase')->name('cart2.purchase');
Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
