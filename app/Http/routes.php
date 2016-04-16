<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {
	Route::get('/', function () {
    	return view('welcome');
	});
	Route::auth();

	Route::get('/home', 'HomeController@index');
	Route::get('/register', function(){
		return view('auth.register');
	})->middleware('isAdmin');
	Route::resource('/users', 'UsersController');
	Route::resource('/product', 'ProductController');
	Route::resource('/category', 'CategoryController');
	Route::resource('/orders', 'OrderController');
	Route::resource('/sales', 'SaleController');
	Route::resource('/settings', 'SettingController');
	Route::get('/shop', function(){
		return view('shop.index');
	});

});