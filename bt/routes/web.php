<?php

use Illuminate\Support\Facades\Route;
Route::get("formLogin", "LoginController@formLogin");

Route::post("login", "LoginController@index");
// 
Route::get('/', 'ProductController@index')->name('home');

Route::get('/show/{id}', 'ProductController@show')->name('show');

Route::get('/cart/{id}', 'ProductController@cart')->name('cart');

Route::get('/delCart/{id}', 'ProductController@delCart')->name('del');

Route::get('/allCart', 'ProductController@allCart')->name('allCart');

Route::post('/addCart', 'ProductController@addCart')->name('addCart');


