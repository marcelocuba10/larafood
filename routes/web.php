<?php

Route::prefix('admin')
        ->namespace('admin')
        ->group(function(){

    /**
     * Routes Details Plans
     */
    Route::post('plans/{url}/details/create','DetailPlanController@store')->name('details.plan.store');      
    Route::get('plans/{url}/details/create','DetailPlanController@create')->name('details.plan.create'); 
    Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');
    Route::get('plans/{url}/showDetail','DetailPlanController@show')->name('details.plan.show');   

    /**
    * Routes Plans
    */
    Route::get('plans/create','PlanController@create')->name('plans.create');
    Route::put('plans/{url}/update','PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit','PlanController@edit')->name('plans.edit');
    Route::get('plans/{url}/show','PlanController@show')->name('plans.show');
    Route::post('plans','PlanController@store')->name('plans.store');
    Route::get('plans','PlanController@index')->name('plans.index');
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::any('plans/{url}/delete','PlanController@delete')->name('plans.delete');
    Route::get('dashboard','PlanController@home')->name('admin.dashboard');
    Route::get('/', 'PlanController@index')->name('admin.index');
});

/**
 * Home Dashboard
 * 
 */
Route::get('/','Admin\PlanController@home');


