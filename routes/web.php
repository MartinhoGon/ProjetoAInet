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

Route::post('requests/{request}/concluirPedido', 'RequestController@concluirPedido')->name('requests.concluirPedido');
Route::post('requests/{request}/recusarPedido', 'RequestController@recusarPedido')->name('requests.recusarPedido');

Route::delete('requests/delete', 'RequestController@destroy')->name('requests.destroy');

Route::get('requests/create', 'RequestController@create')->name('requests.create');
Route::post('requests/create', 'RequestController@store')->name('requests.store');

Route::get('/requests-nameAsc', 'RequestController@orderName')->name('requests.orderName');
Route::get('/requests-departmentAsc', 'RequestController@orderDepartment')->name('requests.orderDepartment');
Route::get('/requests-groupDepartment', 'RequestController@groupDepartment')->name('requests.groupDepartment');

Route::get('/requests/{request}', 'RequestController@showRequest')->name('requests.showRequest');

//-----------users----------------

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}/edit', 'UserController@update')->name('users.update');

Route::get('/users/{user}', 'UserController@showUserPerfil')->name('users.showUserPerfil');

Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');
Route::get('/listUsers-nameAsc', 'UserController@orderName')->name('users.orderName');
Route::get('/listUsers-departmentAsc', 'UserController@orderDepartment')->name('users.orderDepartment');
Route::get('/listUsers-groupDepartment', 'UserController@groupDepartment')->name('users.groupDepartment');

Route::post('listUsers/{id}/block', 'UserController@block')->name('users.block');
Route::post('listUsers/{id}/unblock', 'UserController@unblock')->name('users.unblock');

Route::post('listUsers/{id}/giveAdmin', 'UserController@giveAdmin')->name('users.giveAdmin');
Route::post('listUsers/{id}/takeAdmin', 'UserController@takeAdmin')->name('users.takeAdmin');

//--------------department----------

Route::get('/department', 'DepartmentController@showDepartments')->name('department.showDepartments');



//----------Statistics home-------------
//Route::get('/home/{department_id}','StatisticsRequestsController@showStatistics') ->name('home');
Route::get('/home','StatisticsRequestsController@showStatistics') ->name('home');



//----------administracao----------------

Route::get('/administracao/Users-block', 'AdministradorController@usersBlock')->name('users.usersBlock');
Route::get('/administracao/Users-unblock', 'AdministradorController@usersUnblock')->name('users.usersUnblock');
Route::get('/administracao/Pedidos', 'AdministradorController@pedidos')->name('requests.pedidos');
Route::get('/administracao/Comments-block', 'AdministradorController@commentsBlock')->name('comments.commentsBlock');
Route::get('/administracao/Comments-unblock', 'AdministradorController@commentsUnblock')->name('comments.commentsUnblock');





Route::get('/emailverify/{token}', 'Auth\RegisterController@verify')->name('verify');
Auth::routes();

Route::post('/create', 'Auth\RegisterController@create')->name('create');

Route::get('/', function () {
    return redirect()->route('home');
});