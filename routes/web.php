<?php

use Silber\Bouncer\BouncerFacade as Bouncer;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('customers', function(){
	$user = auth()->user();
	if(Bouncer::is($user)->a('adminstrator', 'user-manager')){
		return view('customers');
	}
	return back()->with('status', 'No Authorization');
});

Route::get('get-customers', 'HomeController@getCustomers')->name('get.customers');

Route::get('products', function(){
	$user = auth()->user();
	if(Bouncer::is($user)->a('adminstrator', 'shop-manager')){
		return view('products');
	}
	return back()->with('status', 'No Authorization');
});
Route::get('get-products', 'HomeController@getProducts')->name('get.products');

Route::get('orders', function(){
	$user = auth()->user();
	if(Bouncer::is($user)->a('adminstrator', 'shop-manager')){
		return view('orders');
	}
	return back()->with('status', 'No Authorization');
});
Route::get('get-orders', 'HomeController@getOrders')->name('get.orders');
Route::get('/orders/{order_id}/process', 'HomeController@processOrder');
