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


Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', function () {
    return view('welcome');
  });
  Route::group(['prefix' => 'users'], function() {
    Route::get('list', 'UserController@list')->name('users.list');
    Route::get('profile/{id}', 'UserController@profile')->name('users.profile');
    Route::get('new', 'UserController@new')->name('users.new');
    Route::post('create', 'UserController@create')->name('users.create');
    Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('update/{id}', 'UserController@update')->name('users.update');
    Route::post('delete/{id}','UserController@delete')->name('users.delete');
  });


  Route::get('/books/list', 'BookController@list')->name('books.list');
  Route::get('/books/new', 'BookController@new')->name('books.new');
  Route::post('/books/create', 'BookController@create')->name('books.create');

  Route::get('/roles/list', 'RoleController@list')->name('roles.list');
  Route::get('/roles/profile/{id}', 'RoleController@profile')->name('roles.profile');
  Route::get('/roles/new', 'RoleController@new')->name('roles.new');
  Route::post('/roles/create', 'RoleController@create')->name('roles.create');
  Route::get('/roles/edit/{id}', 'RoleController@edit')->name('roles.edit');
  Route::post('/roles/update/{id}', 'RoleController@update')->name('roles.update');
  Route::post('/roles/delete/{id}','RoleController@delete')->name('roles.delete');

  Route::get('/permissions/list', 'PermissionController@list')->name('permissions.list');
  Route::get('/permissions/profile/{id}', 'PermissionController@profile')->name('permissions.profile');
  Route::get('/permissions/new', 'PermissionController@new')->name('permissions.new');
  Route::post('/permissions/create', 'PermissionController@create')->name('permissions.create');
  Route::get('/permissions/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
  Route::post('/permissions/update/{id}', 'PermissionController@update')->name('permissions.update');
  Route::post('/permissions/delete/{id}','PermissionController@delete')->name('permissions.delete');

  Route::get('/news/list', 'NewsController@list')->name('news.list');
  Route::get('/news/new', 'NewsController@new')->name('news.new');
  Route::post('/news/create', 'NewsController@create')->name('news.create');
});
