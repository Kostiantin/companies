<?php

Route::get('/', 'IndexController@index');

Auth::routes();

//companies
Route::get('/companies', 'CompanyController@index')->name('companies')->middleware('auth');;
Route::get('/company/create', 'CompanyController@create')->name('company_create')->middleware('auth');;
Route::post('/company/store', 'CompanyController@store')->name('company_store')->middleware('auth');;
Route::get('/company/edit/{company}', 'CompanyController@edit')->name('company_edit')->middleware('auth');;
Route::post('/company/update/{company}', 'CompanyController@update')->name('company_update')->middleware('auth');;
Route::get('/company/destroy/{company}', 'CompanyController@destroy')->name('company_destroy')->middleware('auth');;


//employees
Route::get('/employees', 'EmployeeController@index')->name('employees')->middleware('auth');;
Route::get('/employee/create/{company?}', 'EmployeeController@create')->name('employee_create')->middleware('auth');;
Route::post('/employee/store', 'EmployeeController@store')->name('employee_store')->middleware('auth');;
Route::get('/employee/edit/{employee}', 'EmployeeController@edit')->name('employee_edit')->middleware('auth');;
Route::post('/employee/update/{employee}', 'EmployeeController@update')->name('employee_update')->middleware('auth');;
Route::get('/employee/destroy/{employee}', 'EmployeeController@destroy')->name('employee_destroy')->middleware('auth');;
