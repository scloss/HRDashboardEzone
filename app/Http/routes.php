<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');
Route::get('logout', 'MainController@logout');
Route::get('login','MainController@index');
Route::get('home','MainController@home');
Route::post('authenticate_login','MainController@login_auth');

Route::get('get_employee_api','MainController@get_employee_api');
Route::get('phoenix_get_employee_api','MainController@phoenix_get_employee_api');
Route::get('get_event_api','MainController@get_event_api');
Route::get('get_notice_api','MainController@get_notice_api');
Route::get('get_news_api','MainController@get_news_api');

Route::get('add_employee','MainController@add_employee');
Route::post('add_employee','MainController@insert_employee');
Route::get('add_department','MainController@add_department');
Route::post('add_department','MainController@insert_department');
Route::get('add_designation','MainController@add_designation');
Route::post('add_designation','MainController@insert_designation');
Route::get('add_division','MainController@add_division');
Route::post('add_division','MainController@insert_division');
Route::get('add_section','MainController@add_section');
Route::post('add_section','MainController@insert_section');
Route::get('add_supervisor','MainController@add_supervisor');
Route::post('add_supervisor','MainController@insert_supervisor');
Route::get('add_job_location','MainController@add_job_location');
Route::post('add_job_location','MainController@insert_job_location');
Route::get('add_office_location','MainController@add_office_location');
Route::post('add_office_location','MainController@insert_office_location');
Route::get('add_news','MainController@add_news');
Route::post('add_news','MainController@insert_news');
Route::get('add_notice','MainController@add_notice');
Route::post('add_notice','MainController@insert_notice');
Route::get('add_event','MainController@add_event');
Route::post('add_event','MainController@insert_event');
Route::get('add_image','MainController@add_image');
Route::post('add_image','MainController@insert_image');

Route::get('view_employee','MainController@home');
Route::get('view_employee_hr','MainController@home_hr');
Route::get('view_department','MainController@view_department');
Route::get('view_designation','MainController@view_designation');
Route::get('view_division','MainController@view_division');
Route::get('view_section','MainController@view_section');
Route::get('view_supervisor','MainController@view_supervisor');
Route::get('view_job_location','MainController@view_job_location');
Route::get('view_office_location','MainController@view_office_location');
Route::get('view_news','MainController@view_news');
Route::get('view_notice','MainController@view_notice');
Route::get('view_event','MainController@view_event');
Route::get('view_image_gallery','MainController@view_image_gallery');

Route::get('edit_department','MainController@edit_department');
Route::get('edit_designation','MainController@edit_designation');
Route::get('edit_employee','MainController@edit_employee');
Route::get('edit_division','MainController@edit_division');
Route::get('edit_section','MainController@edit_section');
Route::get('edit_supervisor','MainController@edit_supervisor');
Route::get('edit_job_location','MainController@edit_job_location');
Route::get('edit_office_location','MainController@edit_office_location');

Route::post('confirm_department_edit','MainController@confirm_department_edit');
Route::post('confirm_designation_edit','MainController@confirm_designation_edit');
Route::post('confirm_employee_edit','MainController@confirm_employee_edit');
Route::post('confirm_division_edit','MainController@confirm_division_edit');
Route::post('confirm_section_edit','MainController@confirm_section_edit');
Route::post('confirm_supervisor_edit','MainController@confirm_supervisor_edit');
Route::post('confirm_job_location_edit','MainController@confirm_job_location_edit');
Route::post('confirm_office_location_edit','MainController@confirm_office_location_edit');

Route::get('delete_department','MainController@delete_department');
Route::get('delete_designation','MainController@delete_designation');
Route::get('delete_employee','MainController@delete_employee');
Route::get('delete_division','MainController@delete_division');
Route::get('delete_section','MainController@delete_section');
Route::get('delete_supervisor','MainController@delete_supervisor');
Route::get('delete_job_location','MainController@delete_job_location');
Route::get('delete_office_location','MainController@delete_office_location');

Route::post('confirm_department_delete','MainController@confirm_department_delete');
Route::post('confirm_designation_delete','MainController@confirm_designation_delete');
Route::post('confirm_employee_delete','MainController@confirm_employee_delete');
Route::post('confirm_division_delete','MainController@confirm_division_delete');
Route::post('confirm_section_delete','MainController@confirm_section_delete');
Route::post('confirm_supervisor_delete','MainController@confirm_supervisor_delete');
Route::post('confirm_job_location_delete','MainController@confirm_job_location_delete');
Route::post('confirm_office_location_delete','MainController@confirm_office_location_delete');

Route::get('move_employees','MainController@move_employees');
Route::post('select_move_employees','MainController@select_move_employees');
Route::post('confirm_move_employees','MainController@confirm_move_employees');

Route::post('view_employee_details','MainController@view_employee_details');
Route::get('view_employee_details','MainController@view_employee_details');

Route::get('deactivate_news','MainController@deactivate_news');
Route::get('deactivate_notice','MainController@deactivate_notice');
Route::get('deactivate_event','MainController@deactivate_event');
Route::get('deactivate_image','MainController@deactivate_image');

Route::get('search_employee','MainController@search_employee');
Route::post('search','MainController@search');



// Route::post('get_json_data','MainController@get_json_data');

// Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
