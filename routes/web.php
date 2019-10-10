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
Route::get('/users/lists', 'UserController@index')->name('users');
Route::get('/enable/{module}/', 'UserController@enableModule');
Route::get('/disable/{module}/', 'UserController@disableModule');
Route::get('/sendmail/{id}', 'UserController@sendmail');
 // Route::get('/survey', '\Modules\Survey\Http\Controllers\SurveyController@index');