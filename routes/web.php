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

Route::get('index', 'CustomersController@getIndex')->name('');
Route::get('/', 'CustomersController@getIndex')->name('search');
Route::post('create', 'CustomersController@create')->name('');
Route::get('detail', 'CustomersController@detail')->name('');
Route::get('edit', 'CustomersController@edit')->name('');
Route::get('store', 'CustomersController@store')->name('');
Route::get('update', 'CustomersController@update')->name('');
Route::get('delete', 'CustomersController@delete')->name('');
