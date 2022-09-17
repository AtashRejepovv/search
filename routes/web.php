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

Route::group(['middleware' => ['auth']], function () {



Route::get('/', 'DashboardController@index')->name('dashboard');


/* users */
Route::get('/users','UserController@index')->name('users');
Route::get('/user/create','UserController@create')->name('user.create');
Route::post('/user/store','UserController@store')->name('user.store');
Route::get('/user/delete/{user_id}','UserController@delete')->name('user.delete');
Route::get('/user/block/{user_id}','UserController@block')->name('user.block');
Route::get('/user/open/{user_id}','UserController@open')->name('user.open');
Route::get('/user/permissions/{user_id}','UserController@permissions')->name('user.permissions');
Route::get('/user/edit/{user_id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{user_id}','UserController@update')->name('user.update');
Route::get('/user/profile/{user_id}','UserController@profile')->name('user.profile');
Route::post('/userApi','UserController@getUsersApi')->name('user.api');

Route::get('/changePasw/{slug}','UserController@changePasw')->name('changePasw');
Route::post('/changePaswSave/{slug}','UserController@changePaswSave')->name('changePaswSave');
/* users */

/* role */
Route::get('/roles','RoleController@index')->name('roles');
Route::get('/role/create','RoleController@create')->name('role.create');
Route::get('/role/{role_id}/edit','RoleController@edit')->name('role.edit');
Route::post('/role/update','RoleController@update')->name('role.update');
Route::post('/role/store','RoleController@store')->name('role.store');
Route::get('/role/{role_id}/delete','RoleController@delete')->name('role.delete');
/* role */

/* logs */
Route::get('/logs','LogController@logs')->name('logs');
Route::post('/logsApi','LogController@logsApi')->name('log.api');
Route::get('/logsExcel','LogController@saveExcel')->name('log.saveExcel');
/* logs */

/* numbers */
Route::get('/numbers','NumberController@index')->name('numbers');
Route::get('/number/create','NumberController@create')->name('number.create');
Route::post('/number/store','NumberController@store')->name('number.store');
Route::get('/number/delete/{number_id}','NumberController@delete')->name('number.delete');
Route::get('/number/edit/{number_id}','NumberController@edit')->name('number.edit');
Route::post('/number/update/{number_id}','NumberController@update')->name('number.update');
Route::post('/numberApi','NumberController@getNumbersApi')->name('number.api');
/* numbers */

/* setting */
Route::get('/settings','SettingsController@index')->name('settings');
/* setting */

});
