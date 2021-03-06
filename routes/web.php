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

Auth::routes();

Route::get('/home', 'POSController@index')->name('home');

Route::middleware('auth')->group(function(){

	Route::get('/order', 'POSController@index');
	Route::get('/', 'POSController@index');
	Route::get('/report', 'POSController@showReport');
	// Route::get('/', function () {
	//   return view('welcome');
	// });

	Route::get('/products', 'ProductController@index');
	Route::get('/products/create', 'ProductController@create');
	// Route::get('/products/{product}', 'ProductController@show');

	Route::post('/products', 'ProductController@store');
	Route::get('/products/{product}', 'ProductController@edit');
	Route::delete('/products/{product}', 'ProductController@destroy');
	Route::patch('/products/{product}', 'ProductController@update');

	Route::get('/orders/create', 'OrderController@create');
	Route::get('/orders/{order}', 'OrderController@show');
	Route::post('/orders', 'OrderController@store');

	Route::post('/report', 'POSController@getReport');
	Route::post('/productsReport/{product}', 'ReportController@getReportByProduct');
});
