<?php

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
Route::get('/', function () {
	return view('style.home');
});

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/shop', 'Front\ShopController@index')->name('shop');
Route::resource('/singleproduct', 'Front\SingleProductController@show');
Auth::routes();
