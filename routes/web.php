<?php

//create primero para evitar errores a la hora de crear
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::put('admin/plans/{url}','Admin\PlanController@update')->name('plans.update');
Route::get('admin/plans/{url}/edit','Admin\PlanController@edit')->name('plans.edit');
Route::get('admin/plans/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/plans','Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

Route::get('admin', 'Admin\PlanController@index')->name('admin.index');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Admin\PlanController@index');
