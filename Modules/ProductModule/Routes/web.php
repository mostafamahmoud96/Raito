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

use Illuminate\Support\Facades\Route;

// Route::prefix('productmodule')->group(function() {
//     Route::get('/', 'ProductModuleController@index');
// });

Route::group(['prefix' => 'admin/products', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'ProductModuleController@index')->name('admin.products');
    Route::get('/indexproducts', 'ProductModuleController@indexProducts')->name('admin.products.indexProducts');
    Route::get('add', 'ProductModuleController@create')->name('admin.products.add');
    Route::post('stock/{id}', 'StockController@store')->name('admin.products.stock');
    Route::get('active/{id}', 'ProductModuleController@active')->name('admin.product.active');

    // Route::get('/barcode', 'ProductModuleController@generateBarcode')->name('admin.products.barcode');
    Route::post('store', 'ProductModuleController@store')->name('admin.products.store');
    Route::get('edit/{id}', 'ProductModuleController@edit')->name('admin.products.edit');
    Route::post('/update/{id}', 'ProductModuleController@update')->name('admin.products.update');
    Route::delete('/delete/{id}', 'ProductModuleController@delete')->name('admin.products.delete');


})
;
