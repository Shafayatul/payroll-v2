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
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
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
		Route::resource('offices', 'OfficesController');
		Route::resource('public-holiday-calendars', 'PublicHolidayCalendarsController');
		Route::resource('holidays', 'HolidaysController');
		Route::resource('feedback-categories', 'FeedbackCategoriesController');
		Route::resource('feedback-category-attributes', 'FeedbackCategoryAttributesController');
		Route::resource('departments', 'DepartmentsController');
		Route::resource('interview-types', 'InterviewTypesController');
		Route::resource('email-templates', 'EmailTemplatesController');
		Route::resource('cost-centers', 'CostCentersController');
	});
});

