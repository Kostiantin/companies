<?php


Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//companies
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/company/create', 'CompanyController@create')->name('company_create');
Route::post('/company/store', 'CompanyController@store')->name('company_store');
Route::get('/company/edit/{company}', 'CompanyController@edit')->name('company_edit');
Route::post('/company/update/{company}', 'CompanyController@update')->name('company_update');
Route::get('/company/destroy/{company}', 'CompanyController@destroy')->name('company_destroy');



//employees
Route::get('/employees', 'EmployeeController@index')->name('employees');
Route::get('/employee/create', 'EmployeeController@create')->name('employee_create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee_store');
Route::get('/employee/edit/{employee}', 'EmployeeController@edit')->name('employee_edit');
Route::post('/employee/update/{employee}', 'EmployeeController@update')->name('employee_update');
Route::get('/employee/destroy/{employee}', 'EmployeeController@destroy')->name('employee_destroy');
