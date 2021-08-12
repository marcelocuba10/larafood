<?php

Route::prefix('admin')
    ->namespace('admin')
    ->group(function () {

        /**
         * Routes Profiles
         */

        Route::resource('profiles','ACL\ProfileController'); 

        /**
         * Routes Details Plans
         */
        Route::post('plans/{url}/details/create', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');

        Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');

        Route::any('plans/{url}/details/{idDetail}/delete', 'DetailPlanController@delete')->name('details.plan.delete');

        Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

        /**
         * Routes Plans
         */
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans/create', 'PlanController@create')->name('plans.create');

        Route::put('plans/{url}/update', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');

        Route::any('plans/{url}/delete', 'PlanController@delete')->name('plans.delete');

        Route::get('plans/{url}/show', 'PlanController@show')->name('plans.show');
        Route::get('plans', 'PlanController@index')->name('plans.index');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');

        Route::get('dashboard', 'PlanController@home')->name('admin.dashboard');
        Route::get('/', 'PlanController@index')->name('admin.index');
    });

/**
 * Home Dashboard
 * 
 */
Route::get('/', 'Admin\PlanController@home');
