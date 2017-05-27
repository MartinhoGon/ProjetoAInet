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
Route::post('requests/{requests}/edit', 'RequestController@update')->name('requests.update');

Route::delete('requests/{requests}', 'RequestController@destroy')->name('requests.destroy');

Route::get('requests/create', 'RequestController@create')->name('requests.create');
Route::post('requests/create', 'RequestController@store')->name('requests.store');


//-----------users----------------

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::post('users/{user}/edit', 'UserController@update')->name('users.update');

Route::get('/users/{user}', 'UserController@showUserPerfil')->name('users.showUserPerfil');

//Route::get('/contacts', 'UserController@showContacts')->name('users.showContacts');
Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');
Route::get('/listUsers-nameAsc', 'UserController@orderName')->name('users.orderName');
Route::get('/listUsers-departmentAsc', 'UserController@orderDepartment')->name('users.orderDepartment');

Route::post('admin/{id}/block', 'UserController@block')->name('users.block');

Route::post('admin/{id}/unblock', 'UserController@unblock')->name('users.unblock');
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

