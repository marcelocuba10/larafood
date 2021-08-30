<?php

Route::prefix('admin')
    ->namespace('admin')
    //middleware filtra las solicitudes HTTP que ingresan en la aplicación. Por ejemplo, verifica que el usuario de su aplicación esté autenticado.
    ->middleware('auth')
    ->group(function () {

        /**
         * Routes Permissions x Profiles
         */

        Route::get('profiles/{id}/permissions/{idPermission}/detach','ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::get('permissions/{id}/profiles/{idProfile}/detach','ACL\PermissionProfileController@detachProfilesPermission')->name('permissions.profiles.detach');

        Route::post('profiles/{id}/permissions/store','ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::post('permissions/{id}/profiles/store','ACL\PermissionProfileController@attachProfilesPermission')->name('permissions.profiles.attach');

        //para filtrar permisos disponibles de un perfil, re utilizamos la misma ruta, mudamos para any
        Route::any('profiles/{id}/permissions/create','ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        Route::any('permissions/{id}/profiles/create','ACL\PermissionProfileController@profilesAvailable')->name('permissions.profiles.available');

        Route::get('profiles/{id}/permissions','ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profiles','ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Routes Permissions
         */

        Route::any('permissions/search','ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions','ACL\PermissionController'); 

        /**
         * Routes Profiles
         */

        Route::any('profiles/search','ACL\ProfileController@search')->name('profiles.search');
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

        Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
        Route::get('/', 'PlanController@index')->name('admin.index');
    });

/**
 * Site Routes
 * 
 */

Route::get('/', 'Site\SiteController@index');


/**
 * Auth Routes
 * 
 */

Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
