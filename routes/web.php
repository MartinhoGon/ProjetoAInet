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

Route::get('/requests', 'RequestController@showRequests')->name('users.index');

Route::get('/requests', 'RequestController@showUsers');


Route::get('/listUsers', 'UserController@showUsers');

Auth::routes();

Route::get('/','UserController@showUsers');