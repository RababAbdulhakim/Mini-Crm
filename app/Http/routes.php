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

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();
Route::post('/register',['as' => 'user.register','uses' => 'AdminController@register']);
Route::get('/register',['as' => 'user.register','uses' => 'AdminController@preregister']);
Route::get('/login',['as' => 'user.login','uses' => 'AdminController@prelogin']);
Route::post('/login',['as' => 'user.login','uses' => 'AdminController@login']);
Route::get('/logout', array('uses' => 'AdminController@logout'));


Route::get('/home', 'AdminController@Home');

Route::get('admin/employees', ['as' => 'employee.index', 'uses' => 'EmployeeController@index']);
Route::get('admin/employees/create', ['as' => 'employee.create', 'uses' => 'EmployeeController@create']);
Route::post('admin/employees/create', ['as' => 'employee.store', 'uses' => 'EmployeeController@store']);
Route::get('admin/employees/{id}', ['as' => 'employee.show', 'uses' => 'EmployeeController@show']);
Route::get('admin/employees/{id}/edit', ['as' => 'employee.edit', 'uses' => 'EmployeeController@edit']);
Route::patch('admin/employees/{id}', ['as' => 'employee.update', 'uses' => 'EmployeeController@update']);
Route::delete('admin/employees/{id}', ['as' => 'employee.destroy', 'uses' => 'EmployeeController@destroy']);


Route::get('admin/customers', ['as' => 'customer.index', 'uses' => 'CustomerController@index']);
Route::get('admin/customers/create', ['as' => 'customer.create', 'uses' => 'CustomerController@create']);
Route::post('admin/customers/create', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);
Route::get('admin/customers/{id}', ['as' => 'customer.show', 'uses' => 'CustomerController@show']);
Route::get('admin/customers/{id}/edit', ['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
Route::patch('admin/customers/{id}', ['as' => 'customer.update', 'uses' => 'CustomerController@update']);
Route::delete('admin/customers/{id}', ['as' => 'customer.destroy', 'uses' => 'CustomerController@destroy']);

Route::get('admin/actions' , ['as' => 'actions' , 'uses' => 'ActionController@index']);
Route::post('/action', array('uses' => 'ActionController@store'));
//Route::get('action/update/{id}/edit', ['as' => 'customer.edit', 'uses' => 'CustomerController@ActionUpdate']);
//Route::pach('/action/update/{id}', array('uses' => 'EmployeeController@ActionUpdate'));

