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

		// WEB-PAGE REQUESTING ROUTE 
		Route::get('/home', 'HomeController@index')->name('home');
		Route::get('/password-change', 'UsersController@passwordWordChange')->name('password-change');
		Route::post('/password-update', 'UsersController@passwordUpdate')->name('password-update');
		Route::resource('users', 'UsersController');
		Route::get('/user-inactive/{id}', 'UsersController@userInactive')->name('user-inactive');
		Route::get('/user-active/{id}', 'UsersController@userActive')->name('user-active');
		Route::resource('industries', 'IndustriesController');
		
		// PAYROLL SETTINGS REQUESTING ROUTE
		Route::group(['prefix' => 'configuration'], function () {

			Route::resource('companies', 'CompaniesController');

			// CUSTOM-FIELDS REQUESTING ROUTE
			Route::group(['prefix' => 'custom-fields'], function () {
				Route::get('/', 'CustomFieldController@index')->name('setting.employee-information');
				Route::post('section/', 'CustomFieldController@sectionStore')->name('setting.section.store');
				Route::post('section/update', 'CustomFieldController@updateName')->name('setting.section.update.name');
				Route::post('section/update/name', 'CustomFieldController@updateName')->name('setting.section.update.name');
				Route::post('section/attribute/store', 'CustomFieldController@attributeStore')->name('setting.attribute.store');
			});
		});
		Route::resource('departments', 'DepartmentsController');
		Route::resource('offices', 'OfficesController');
		Route::resource('public-holiday-calendars', 'PublicHolidayCalendarsController');
		Route::resource('holidays', 'HolidaysController');
		Route::resource('feedback-categories', 'FeedbackCategoriesController');
		Route::resource('feedback-category-attributes', 'FeedbackCategoryAttributesController');
		Route::resource('interview-types', 'InterviewTypesController');
		Route::resource('email-templates', 'EmailTemplatesController');
		Route::resource('cost-centers', 'CostCentersController');
		Route::resource('payroll-groups', 'PayrollGroupsController');
		Route::resource('recruiting-phases', 'RecruitingPhasesController');
		Route::resource('recurring-compensation-types', 'RecurringCompensationTypesController');
		Route::resource('payroll-histories', 'PayrollHistoriesController');
		Route::resource('attendence-working-hours', 'AttendenceWorkingHoursController');
		Route::post('attendence-working-hours/update', 'AttendenceWorkingHoursController@update')->name('attendence-working-hours-update');
		
		// AJAX REQUESTING ROUTE
		Route::get('get-ajax-office-data/{id}', 'OfficesController@getAjaxOfficeData');
		Route::get('absenses', 'AbsensesController@index');
		Route::post('absenses', 'AbsensesController@store')->name('absences.store');
		Route::post('absenses/{id}', 'AbsensesController@update')->name('absence.update');
		Route::delete('absences/{id}', 'AbsensesController@destroy')->name('absences.destroy');
		
		Route::get('calendars', 'CalendarsController@index')->name('calendars.index');
		Route::post('calendars/update', 'CalendarsController@update')->name('calendars.update');

		Route::get('payroll/general', 'PayrollGeneralSettingsController@index')->name('payroll.general');
		Route::post('payroll/update/{id}', 'PayrollGeneralSettingsController@update')->name('payroll.update');
		
		// FUNCTION REQUEST ROUTE
		// Route::resource('companies', 'CompaniesController');
		
		
	});
});

