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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

});

Route::group(['prefix' => 'users'], function() {
  Route::get('list', 'UserController@list')->name('users.list');
  Route::get('profile/{id}', 'UserController@profile')->name('users.profile');
  Route::get('new', 'UserController@new')->name('users.new');
  Route::post('create', 'UserController@create')->name('users.create');
  Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
  Route::post('update/{id}', 'UserController@update')->name('users.update');
});



Route::get('/users/newRoles/{id}', 'UserController@newRoles')->name('users.newRoles');
Route::post('/users/updateRole/{id}', 'UserController@updateRole')->name('users.updateRole');

Route::get('/books/booksList', 'BookController@booksList')->name('books.booksList');
Route::get('/books/newBook', 'BookController@newBook')->name('books.newBook');
Route::post('/books/createBook', 'BookController@createBook')->name('books.createBook');

Route::get('/roles/rolesList', 'RoleController@rolesList')->name('roles.rolesList');
Route::get('/roles/newRole', 'RoleController@newRole')->name('roles.newRole');
Route::post('/roles/createRole', 'RoleController@createRole')->name('roles.createRole');

Route::get('/news/newsList', 'NewsController@newsList')->name('news.newsList');
Route::get('/news/newNews', 'NewsController@newNews')->name('news.newNews');
Route::post('/news/createNews', 'NewsController@createNews')->name('news.createNews');
