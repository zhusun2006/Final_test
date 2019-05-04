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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('/signup', 'UsersController@create')->name('signup');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::delete('/logout', 'SessionsController@destroy')->name('logout');

Route::get('/users/{user}/apply', 'UsersController@apply')->name('apply');
Route::get('/users/{user}/inform', 'UsersController@inform')->name('inform');

Route::get('/notices', 'NotificationsController@index')->name('notice');
Route::get('/adminnotice', 'NotificationsController@adminnotice')->name('adminnotice');
Route::get('/check', 'NotificationsController@check')->name('check');
Route::get('/result', 'NotificationsController@result')->name('result');
Route::get('/threads', 'NotificationsController@watch')->name('thread');

Route::get('/check/download', 'UploadController@download')->name('download');

Route::get('/adminset', 'AdminController@setadmin')->name('adminset');

Route::resource('users', 'UsersController');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

