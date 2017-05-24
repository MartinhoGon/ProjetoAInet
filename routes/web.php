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
//---------Request-----------------
Route::get('/requests', 'RequestController@showRequests')->name('requests.showRequests');

Route::get('requests/{requests}/edit', 'RequestController@edit')->name('requests.edit');
Route::put('requests/{requests}/edit', 'RequestController@update')->name('requests.update');

Route::delete('requests/{requests}', 'RequestController@destroy')->name('requests.destroy');

Route::get('requests/create', 'RequestController@create')->name('requests.create');
Route::post('requests/create', 'RequestController@store')->name('requests.store');


//-----------users----------------
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}/edit', 'UserController@update')->name('users.update');

// Route::get('users/create', 'UserController@create')->name('users.create');
// Route::post('users/create', 'UserController@store')->name('users.store');

Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');




//--------------department----------

Route::get('/department', 'DepartmentController@showDepartments')->name('department.showDepartments');


Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

// //Route::get('/home', 'DepartmentController@showDepartments');

// Route::get('/', function () {
//     return redirect()->route('home');
// });



//----------Statistics home-------------

Route::get('/home','StatisticsRequestsController@showStatistics') ->name('home');

