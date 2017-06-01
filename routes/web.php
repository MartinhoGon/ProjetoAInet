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
Route::get('/user-requests/{user}', 'RequestController@showRequests')->name('requests.showRequests')->middleware('checkUser');

Route::get('requests/{request}/edit', 'RequestController@edit')->name('requests.edit');
Route::put('requests/{request}/edit', 'RequestController@update')->name('requests.update');

Route::post('requests/{request}/concluirPedido', 'RequestController@concluirPedido')->name('requests.concluirPedido');
Route::post('requests/{request}/recusarPedido', 'RequestController@recusarPedido')->name('requests.recusarPedido');

Route::delete('requests/delete', 'RequestController@destroy')->name('requests.destroy');

Route::get('requests/create', 'RequestController@create')->name('requests.create');
Route::post('requests/create', 'RequestController@store')->name('requests.store');

Route::get('/requests-nameAsc', 'RequestController@orderName')->name('requests.orderName');
Route::get('/requests-departmentAsc', 'RequestController@orderDepartment')->name('requests.orderDepartment');
Route::get('/requests-groupDepartment', 'RequestController@groupDepartment')->name('requests.groupDepartment');

Route::get('/show-requests/{request}', 'RequestController@showRequest')->name('requests.showRequest');

Route::post('requests/{request}/concluirAvaliacao', 'RequestController@concluirAvaliacao')->name('requests.concluirAvaliacao');

//-----------users----------------

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}/edit', 'UserController@update')->name('users.update');

Route::get('/users/{user}', 'UserController@showUserPerfil')->name('users.showUserPerfil');

Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');
Route::get('/listUsers-nameAsc', 'UserController@orderName')->name('users.orderName');
Route::get('/listUsers-departmentAsc', 'UserController@orderDepartment')->name('users.orderDepartment');
Route::get('/listUsers-groupDepartment', 'UserController@groupDepartment')->name('users.groupDepartment');

Route::post('listUsers/{user}/block', 'UserController@block')->name('users.block');
Route::post('listUsers/{user}/unblock', 'UserController@unblock')->name('users.unblock');

Route::post('listUsers/{user}/giveAdmin', 'UserController@giveAdmin')->name('users.giveAdmin');
Route::post('listUsers/{user}/takeAdmin', 'UserController@takeAdmin')->name('users.takeAdmin');

//--------------department----------

Route::get('/department', 'DepartmentController@showDepartments')->name('department.showDepartments');



//----------Statistics home-------------
Route::post('/home','StatisticsRequestsController@showStatistics') ->name('home');
Route::get('/home','StatisticsRequestsController@showStatistics') ->name('home');



//----------administracao----------------

Route::get('/administracao/Users-block', 'AdministradorController@usersBlock')->name('users.usersBlock')->middleware('checkedAdmin');
Route::get('/administracao/Users-unblock', 'AdministradorController@usersUnblock')->name('users.usersUnblock')->middleware('checkedAdmin');;
Route::get('/administracao/Pedidos', 'AdministradorController@pedidos')->name('requests.pedidos')->middleware('checkedAdmin');;
Route::get('/administracao/Comments-block', 'AdministradorController@commentsBlock')->name('comments.commentsBlock')->middleware('checkedAdmin');;
Route::get('/administracao/Comments-unblock', 'AdministradorController@commentsUnblock')->name('comments.commentsUnblock')->middleware('checkedAdmin');; 




Route::get('/users/confirmation/{remember_token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Auth::routes();

Route::post('/create', 'Auth\RegisterController@create')->name('create');

Route::get('/', function () {
    return redirect()->route('home');
});

