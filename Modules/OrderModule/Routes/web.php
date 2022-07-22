<?php

use Illuminate\Support\Facades\Route;
use s\Order\Entities\Order;

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

Route::group(['prefix' => 'admin/orders', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'OrderAdminController@index')->name('admin.orders');
    Route::get('/indexorders', 'OrderAdminController@indexOrders')->name('admin.orders.index');

    Route::get('create', 'OrderAdminController@create')->name('admin.order.create');
    Route::get('search', 'OrderAdminController@search')->name('admin.order.search');
    Route::get('show/{id}', 'OrderAdminController@show')->name('admin.order.show');
    Route::get('view/{id}', 'OrderAdminController@showOrder')->name('admin.order.view');

    Route::post('store', 'OrderAdminController@store')->name('admin.order.store');
    Route::delete('delete/{id}', 'OrderAdminController@delete')->name('admin.order.delete');

});

Route::group(['prefix' => 'customer/orders', 'middleware' => ['auth:customer']], function () {
    Route::get('/', 'OrderCustomerController@index')->name('customer.orders');
    Route::get('/indexorders', 'OrderCustomerController@indexOrders')->name('customer.orders.index');

Route::get('create', 'OrderCustomerController@create')->name('customer.order.create');
Route::get('search', 'OrderCustomerController@search')->name('customer.order.search');
Route::post('store', 'OrderCustomerController@store')->name('customer.order.store');
Route::get('show/{id}', 'OrderCustomerController@show')->name('customer.order.show');

});
