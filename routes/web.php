<?php

Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','Admin\PlanController@index');