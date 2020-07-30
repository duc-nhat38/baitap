<?php

use Illuminate\Support\Facades\Route;
Route::get("formLogin", "LoginController@formLogin");

Route::post("login", "LoginController@index");
// 
Route::get('/', 'ProductController@index')->name('home');

Route::get('/show/{id}', 'ProductController@show')->name('show');

Route::get('/cart/{id}', 'CartController@addCart')->name('cart');

Route::post('/delCart', 'CartController@delCart')->name('del');

Route::get('/allCart', 'CartController@allCart')->name('allCart');

Route::post('/addCart', 'CartController@addQuantityProductCart')->name('addCart');


