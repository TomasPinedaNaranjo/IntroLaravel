<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', function () {

    $data1 = "About us - Online Store";
    
    $data2 = "About us";
    
    $description = "This is an about page ...";
    
    $author = "Developed by: Your Name";
    
    return view('home.about')->with("title", $data1)
    
    ->with("subtitle", $data2)
    
    ->with("description", $description)
    
    ->with("author", $author);
    
    })->name("home.about");


Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");

Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/contact', 'App\Http\Controllers\ContactController@show')->name("contact.show");
#Taller 1 - Clase Orders
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name("order.create");
Route::get('/orders/list', 'App\Http\Controllers\OrderController@list')->name("order.list");
Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name("order.save");
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name("order.show");
Route::get('/orders/{id}/delete', 'App\Http\Controllers\OrderController@delete')->name("order.delete");
