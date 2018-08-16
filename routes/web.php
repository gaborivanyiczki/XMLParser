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

Route::get('/settings/users', 'SettingsController@users')->name('settings.users');

Route::resource('/users', 'UsersController');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/file', 'FilesController@store')->name('file.upload');

Route::get('/file', 'FilesController@index')->name('file.index');

Route::delete('/file/{id}', 'FilesController@destroy')->name('file.destroy');

Route::get('/file/parse/{id}', 'FilesController@parse')->name('file.parse');