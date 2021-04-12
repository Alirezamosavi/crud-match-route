<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProductController;
  
Route::resource('products', ProductController::class);


Route::match(array('GET', 'POST'),'/test', 'App\Http\Controllers\ProductController@test'); 















Route::get('/Test', 'App\Http\Controllers\ProductController@index');
Route::post('/store', 'App\Http\Controllers\ProductController@store');


