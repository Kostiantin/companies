<?php


Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//companies
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/company/create', 'CompanyController@create')->name('company_create');
Route::post('/company/store', 'CompanyController@store')->name('company_store');



//employees
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/employee/create', 'EmployeeController@create')->name('employee_create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee_store');
