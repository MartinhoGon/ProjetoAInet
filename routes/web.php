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
Route::get('/requests', 'RequestController@showRequests')->name('requests.index');

Route::get('requests/{requests}/edit', 'RequestController@edit')->name('requests.edit')

Route::put('requests/{requests}/edit', 'RequestController@update')->name('requests.update');

Route::delete('$requests/{user}', 'UserController@destroy')->name('users.destroy');

//-----------users----------------
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}/edit', 'UserController@update')->name('users.update');

Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');


//--------------department----------



Route::get('/department', 'DepartmentController@showDepartment')->name('department.index');


Route::get('/home', 'DepartmentController@showDepartments');

Route::get('/home', 'DepartmentController@showDepartments');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect()->route('users.showUsers');
});





/*
Route::get('users', 'UserController@index')->name('users.index');
Route::get('users/create', 'UserController@create')->name('users.create');
Route::post('users/create', 'UserController@store')->name('users.store');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

// Route::resource('users', 'UserController');

Route::get('/', function () {
    return redirect()->route('users.index');
});

*/