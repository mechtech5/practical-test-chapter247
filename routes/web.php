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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('customers', 'customers');
Route::get('get-customers', 'HomeController@getCustomers')->name('get.customers');

Route::view('products', 'products');
Route::get('get-products', 'HomeController@getProducts')->name('get.products');

Route::view('orders', 'orders');
Route::get('get-orders', 'HomeController@getOrders')->name('get.orders');
Route::get('/orders/{order_id}/process', 'HomeController@processOrder');
