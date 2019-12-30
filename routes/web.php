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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/password-change', 'UsersController@passwordWordChange')->name('password-change');
	Route::post('/password-update', 'UsersController@passwordUpdate')->name('password-update');
	Route::resource('users', 'UsersController');
	Route::get('/user-inactive/{id}', 'UsersController@userInactive')->name('user-inactive');
	Route::get('/user-active/{id}', 'UsersController@userActive')->name('user-active');
	Route::resource('companies', 'CompaniesController');
	Route::resource('industries', 'IndustriesController');
});
