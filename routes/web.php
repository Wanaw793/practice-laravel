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
Route::post('', 'CustomersController@getIndex')->name('search');
Route::get('create', 'CustomersController@create')->name('create');
Route::get('detail/{id}', 'CustomersController@detail')->name('detail');
Route::get('edit/{id}', 'CustomersController@edit')->name('edit');
Route::post('store', 'CustomersController@store')->name('store');
Route::post('update', 'CustomersController@update')->name('update');
Route::get('delete/{id}', 'CustomersController@delete')->name('delete');
