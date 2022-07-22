<?php
use Illuminate\Support\Facades\Route;

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

Route::prefix('customer')->group(function() {
    Route::get('logout', 'Auth\CustomerAuthController@logout')->name('customer.logout');
    Route::get('/', 'Auth\CustomerAuthController@index')->name('customer.login');
        Route::post('login', 'Auth\CustomerAuthController@login')->name('customer.loginpost');

});
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
        Route::get('customers', 'CustomerAdminController@index')->name('admin.customers');
        Route::get('/getIndexCustomers', 'CustomerAdminController@getIndexCustomers')->name('admin.customers.getIndexCustomers');//datatable
        Route::get('add', 'CustomerAdminController@create')->name('admin.customers.add');
        Route::post('store', 'CustomerAdminController@store')->name('admin.customers.store');
        Route::get('edit/{id}', 'CustomerAdminController@edit')->name('admin.customers.edit');
        Route::post('update', 'CustomerAdminController@update')->name('admin.customers.update');
        Route::delete('delete/{id}', 'CustomerAdminController@destroy')->name('admin.customers.delete');
});
