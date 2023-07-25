<?php

use App\Http\Controllers\Api\V1\Admin\MediaController;
use App\Http\Controllers\Api\V1\Admin\ServiceFormsApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    Route::apiResource('cars', 'ParseXmlController', ['only' => ['index']]);


    Route::apiResource('settings', 'SettingsApiController', ['only' => ['index', 'store']]);
    Route::post('getPdf', 'ParseXmlController@getPdf');


    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Companies
    Route::get('companies/list', 'CompaniesApiController@list')->name('companies.list');
    Route::resource('companies', 'CompaniesApiController');

    Route::get('service_forms/filter', [ServiceFormsApiController::class, 'getFilter']);
    Route::post('service_forms/media', [ServiceFormsApiController::class, 'storeMedia']);
    Route::resource('service_forms', 'ServiceFormsApiController');

    Route::delete('media/{media_id}', [MediaController::class, 'deleteMedia']);

});

Route::post('api/v1/sendMessage', 'Api\V1\Admin\TelegramApiController@sendMessage');

