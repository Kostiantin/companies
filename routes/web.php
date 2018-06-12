<?php


Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//companies
Route::get('/companies', 'CompanyController@index')->name('companies');
Route::get('/companies/create', 'CompanyController@create')->name('company_create');
Route::post('/companies/store', 'CompanyController@create');



//employees
Route::get('/employees', 'EmployeeController@index')->name('employees');
