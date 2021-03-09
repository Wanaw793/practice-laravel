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

Route::get('', 'CustomersController@getIndex')->name('index');
Route::post('index', 'CustomersController@getIndex')->name('search');
Route::post('create', 'CustomersController@create')->name('create');
Route::get('detail', 'CustomersController@detail')->name('detail');
Route::get('edit', 'CustomersController@edit')->name('edit');
Route::get('store', 'CustomersController@store')->name('store');
Route::post('update', 'CustomersController@update')->name('update');
Route::post('delete', 'CustomersController@delete')->name('delete');
