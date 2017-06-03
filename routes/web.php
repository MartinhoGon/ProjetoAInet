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

Route::get('requests/{request}/edit', 'RequestController@edit')->name('requests.edit')->middleware('auth');
Route::put('requests/{request}/edit', 'RequestController@update')->name('requests.update')->middleware('auth');

Route::post('requests/{request}/concluirPedido', 'RequestController@concluirPedido')->name('requests.concluirPedido')->middleware('checkedAdmin');
Route::post('requests/{request}/recusarPedido', 'RequestController@recusarPedido')->name('requests.recusarPedido')->middleware('checkedAdmin');

Route::delete('requests/{request}', 'RequestController@destroy')->name('requests.destroy')->middleware('auth');

Route::get('requests/create', 'RequestController@create')->name('requests.create')->middleware('auth');
Route::post('requests/create', 'RequestController@store')->name('requests.store')->middleware('auth');

Route::get('/requests-nameAsc', 'RequestController@orderName')->name('requests.orderName')->middleware('auth');
Route::get('/requests-departmentAsc', 'RequestController@orderDepartment')->name('requests.orderDepartment')->middleware('auth');
Route::get('/requests-groupDepartment', 'RequestController@groupDepartment')->name('requests.groupDepartment')->middleware('auth');

Route::get('/show-requests/{request}', 'RequestController@showRequest')->name('requests.showRequest')->middleware('auth');

Route::post('requests/{request}/concluirAvaliacao', 'RequestController@concluirAvaliacao')->name('requests.concluirAvaliacao')->middleware('checkedAdmin');

Route::get('/show-requests/{request}/downloadFile', 'RequestController@downloadFile')->name('requests.downloadFile')->middleware('checkedAdmin');


//-----------users----------------

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('auth');
Route::put('users/{user}/edit', 'UserController@update')->name('users.update')->middleware('auth');

Route::get('/users/{user}', 'UserController@showUserPerfil')->name('users.showUserPerfil');

Route::get('/listUsers', 'UserController@showUsers')->name('users.showUsers');
Route::get('/listUsers-nameAsc', 'UserController@orderName')->name('users.orderName')->middleware('auth');
Route::get('/listUsers-departmentAsc', 'UserController@orderDepartment')->name('users.orderDepartment')->middleware('auth');
Route::get('/listUsers-groupDepartment', 'UserController@groupDepartment')->name('users.groupDepartment')->middleware('auth');

Route::post('listUsers/{user}/block', 'UserController@block')->name('users.block')->middleware('checkedAdmin');
Route::post('listUsers/{user}/unblock', 'UserController@unblock')->name('users.unblock')->middleware('checkedAdmin');

Route::post('listUsers/{user}/giveAdmin', 'UserController@giveAdmin')->name('users.giveAdmin')->middleware('checkedAdmin');
Route::post('listUsers/{user}/takeAdmin', 'UserController@takeAdmin')->name('users.takeAdmin')->middleware('checkedAdmin');

//--------------department----------

Route::get('/department', 'DepartmentController@showDepartments')->name('department.showDepartments')->middleware('auth');



//----------Statistics home-------------
Route::post('/home', 'StatisticsRequestsController@showStatistics') ->name('home');
Route::get('/home', 'StatisticsRequestsController@showStatistics') ->name('home');



//----------administracao----------------

Route::get('/administracao/Users-block', 'AdministradorController@usersBlock')->name('users.usersBlock')->middleware('checkedAdmin');
Route::get('/administracao/Users-unblock', 'AdministradorController@usersUnblock')->name('users.usersUnblock')->middleware('checkedAdmin');;
Route::get('/administracao/Pedidos', 'AdministradorController@pedidos')->name('requests.pedidos')->middleware('checkedAdmin');;
Route::get('/administracao/Comments-block', 'AdministradorController@commentsBlock')->name('comments.commentsBlock')->middleware('checkedAdmin');;
Route::get('/administracao/Comments-unblock', 'AdministradorController@commentsUnblock')->name('comments.commentsUnblock')->middleware('checkedAdmin');;


//------------comments-----------------------------------------

Route::post('listComments/{comment}/block', 'CommentController@block')->name('comments.block')->middleware('checkedAdmin');
Route::post('listComments/{comment}/unblock', 'CommentController@unblock')->name('comments.unblock')->middleware('checkedAdmin');




Route::get('/users/confirmation/{remember_token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Auth::routes();

Route::post('/create', 'Auth\RegisterController@create')->name('create');

Route::get('/', function () {
    return redirect()->route('home');
});
