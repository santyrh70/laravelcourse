<?php

use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::redirect('/', '/index');

Route::get('/index', 'HomeController@index')->name("home.index");

Route::get('/contact', 'HomeController@contact')->name("home.contact");

Route::get('/product/show/{id?}', 'ProductController@show')->name("product.show");

Route::get('/product/create', 'ProductController@create')->name("product.create");

Route::post('/product/save', 'ProductController@store')->name("product.store");

Route::get('/image/index', 'ImageController@index')->name("image.index");

Route::post('/image/save', 'ImageController@save')->name("image.save");