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
			Route::prefix('custom-fields')->name('setting.')->group( function () {
				
				Route::get('/', 'CustomFieldController@index')->name('employee-information');
				Route::post('section/store', 'CustomFieldController@sectionStore')->name('section.store');
				Route::post('section/update', 'CustomFieldController@sectionUpdate')->name('section.update');
				Route::post('section/update/name', 'CustomFieldController@sectionUpdateName')->name('section.update.name');
				Route::DELETE('section/destroy', 'CustomFieldController@sectionDestroy')->name('section.destroy');

				Route::post('section/attribute/store', 'CustomFieldController@attributeStore')->name('attribute.store');
				Route::post('section/attribute/update', 'CustomFieldController@attributeUpdate')->name('attribute.update');
				Route::DELETE('section/attribute/destroy', 'CustomFieldController@attributeDestroy')->name('attribute.destroy');
			});

			// EMPLOYEE ROLES REQUESTING ROUTE
			// Route::get('setting/employee-role', 'EmployeeRolesController@index')->name('setting.employee-role');
			Route::prefix('roles')->name('roles.')->group( function () {
				// Route::get('setting/employee-role', 'EmployeeRolesController@index')->name('setting.employee-role');
				Route::get('/{category}', 'EmployeeRolesController@index')->name('index');
				Route::post('/update/members', 'EmployeeRolesController@updateMembers')->name('update.members');
				Route::post('/update/rights', 'EmployeeRolesController@updateRights')->name('update.rights');
				Route::post('/store/reminder', 'EmployeeRolesController@storeReminder')->name('store.reminder');
				Route::post('/update/reminder', 'EmployeeRolesController@updateReminder')->name('update.reminder');
				Route::post('/delete/reminder', 'EmployeeRolesController@deleteReminder')->name('delete.reminder');
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

		Route::get('on-off-boardings', 'OnOffBoardingsController@index')->name('on-off-boardings.index');
		Route::post('boarding-template/store', 'OnOffBoardingsController@boardingTemplatestore')->name('boarding-template.store');
		Route::post('boarding-step/store', 'OnOffBoardingsController@boardingStepstore')->name('boarding-step.store');
		Route::post('boarding-step-item/store', 'OnOffBoardingsController@boardingStepItemstore')->name('boarding-step-item.store');
		Route::post('boarding-template-step/store', 'OnOffBoardingsController@boardingTemplateStepStore')->name('boarding-template-step.store');
		Route::post('boarding-template-step/update', 'OnOffBoardingsController@boardingTemplateStepUpdate')->name('boarding-template-step.update');
		Route::post('boarding-step-item/update', 'OnOffBoardingsController@boardingStepItemUpdate')->name('boarding-step-item.update');

		Route::post('boarding-template-update', 'OnOffBoardingsController@templateUpdate')->name('template-update');
		Route::post('boarding-step-update', 'OnOffBoardingsController@stepUpdate')->name('step-update');

		Route::post('groups/create', 'OnOffBoardingsController@groupStore')->name('groups.create');
		Route::post('group-user/store', 'OnOffBoardingsController@groupUserStore')->name('group-user.store');

		Route::post('group-update', 'OnOffBoardingsController@groupUpdate')->name('group-update');


		Route::get('setting/document', 'DocumentsController@index')->name('setting.document');
		Route::post('document-category/store', 'DocumentsController@documentCategoryStore')->name('document-category.store');
		Route::post('document-category/update', 'DocumentsController@documentCategoryUpdate')->name('document-category.update');

		Route::post('documents/template-upload', 'DocumentsController@documentTemplateUpload')->name('documents.template-upload');
		
		// FUNCTION REQUEST ROUTE
		// Route::resource('companies', 'CompaniesController');

		Route::prefix('employees')->name('employees.')->group( function () {
			Route::get('index', 'Admin\EmployeeController@index')->name('index');
			Route::post('store', 'Admin\EmployeeController@store')->name('store');
			Route::get('{id}/edit', 'Admin\EmployeeController@edit')->name('edit');
			Route::post('update', 'Admin\EmployeeController@update')->name('update');

			Route::get('attendance', 'Admin\EmployeeController@employeesAttendance')->name('attendance');
			Route::post('attendance/set', 'Admin\EmployeeController@setAttendance')->name('attendance.set');
			
			Route::get('absence', 'Admin\EmployeeController@employeesAbsence')->name('absence');
			Route::get('absence/get/{id}', 'Admin\EmployeeController@getAbsence')->name('absence.get');
			Route::post('absence/set', 'Admin\EmployeeController@setAbsence')->name('absence.set');
			
			Route::get('attendance/get/{id}', 'Admin\EmployeeController@getAttendance')->name('get');
		});

		Route::prefix('overtime')->name('overtime.')->group(function (){
			Route::get('index', 'AbsensesController@overtimeIndex')->name('index');
			Route::post('store', 'AbsensesController@overtimeStore')->name('store');
		});

		Route::prefix('mutuality')->name('mutuality.')->group(function (){
			Route::get('index', 'AbsensesController@mutualityIndex')->name('index');
			Route::post('store', 'AbsensesController@mutualityStore')->name('store');
			Route::post('update', 'AbsensesController@mutualityUpdate')->name('update');
		});

		Route::prefix('contribution')->name('contribution.')->group(function (){
			Route::get('index', 'AbsensesController@contributionIndex')->name('index');
			Route::post('store', 'AbsensesController@contributionStore')->name('store');
			Route::post('update', 'AbsensesController@contributionUpdate')->name('update');
		});

		Route::prefix('salary')->name('salary.')->group(function () {
			Route::get('/', 'SalaryController@index')->name('index');
			// Route::get('/info/{id}', 'SalaryController@salaryInfo')->name('info');
			Route::get('/info/{id}', 'SalaryController@info')->name('info');
			Route::post('/payment', 'SalaryController@payment')->name('payment');
		});
	});
});

