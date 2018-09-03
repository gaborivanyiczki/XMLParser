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

//Resources
Route::resource('/users', 'UsersController');
Route::resource('/clients', 'ClientsController');

//Other custom routes
Route::get('/settings/users', 'SettingsController@users')->name('settings.users');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/file', 'FilesController@store')->name('file.upload');

Route::get('/file', 'FilesController@index')->name('file.index');

Route::delete('/file/{id}', 'FilesController@destroy')->name('file.destroy');

Route::get('/file/parse/{id}', 'FilesController@parse')->name('file.parse');

Route::get('/clients/getclients', 'ClientsController@getClients')->name('clients.get');

Route::get('/newcardholder', 'NewCardHolderController@index')->name('newcardholder.index');

Route::get('/newcardholder/get/{sponsor}', 'NewCardHolderController@get')->name('newcardholder.get');

Route::get('/session/{id}', 'HomeController@setSession')->name('home.session');

//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
Route::get('/', 'AdminController@index')->name('admin.index');

//Admin Role
Route::get('/roles', 'AdminController@roles')->name('admin.roles');

Route::get('/roles/index', 'AdminController@indexRole')->name('admin.roles.index');

Route::post('/roles', 'AdminController@storeRoles')->name('admin.roles.store');

Route::put('/roles/{id}', 'AdminController@updateRole')->name('admin.roles.update');

Route::delete('/roles/{id}', 'AdminController@destroyRole')->name('admin.roles.delete');

//Admin Types


//Admin Attributes

//Assign role

});