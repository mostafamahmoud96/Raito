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

Route::prefix('admin')->group(function () {
    Route::get('/', 'Auth\AdminAuthController@index')->name('admin.login');
    Route::post('login', 'Auth\AdminAuthController@login')->name('admin.loginpost');
});



