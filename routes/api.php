<?php

use App\Http\Controllers\Api\V1\Admin\MediaController;
use App\Http\Controllers\Api\V1\Admin\ParseXmlController;
use App\Http\Controllers\Api\V1\Admin\UsersApiController;
use App\Http\Controllers\Api\V1\Admin\ServiceFormsApiController;


Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::get('service_forms/lkp', [ServiceFormsApiController::class, 'cronFetchAppraisals']);
    Route::get('loadXml', [ParseXmlController::class, 'loadXml']);

});




// 'middleware' => ['auth:sanctum']
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
    Route::get('users/profile/edit', [UsersApiController::class, 'profile']);

    Route::resource('users', 'UsersApiController');

    // Companies
    Route::get('companies/list', 'CompaniesApiController@list')->name('companies.list');
    Route::resource('companies', 'CompaniesApiController');

    Route::get('service_forms/filter', [ServiceFormsApiController::class, 'getFilter']);
    Route::get('service_forms/{serviceForm}/lkp', [ServiceFormsApiController::class, 'fetchAppraisals']);
    Route::get('service_forms/{id}/lkp/svg', [ServiceFormsApiController::class, 'generateLKPSvg']);
    Route::get('service_forms/{id}/lkp/table', [ServiceFormsApiController::class, 'generateLKPTableData']);



    
    Route::post('service_forms/media', [ServiceFormsApiController::class, 'storeMedia']);

    Route::post('service_forms/form_media/vin', [ServiceFormsApiController::class, 'storeFormMediaVIN']);
    Route::post('service_forms/form_media/extra', [ServiceFormsApiController::class, 'storeFormMediaExtra']);


    Route::resource('service_forms', 'ServiceFormsApiController');

    Route::delete('media/{media_id}', [MediaController::class, 'deleteMedia']);

});

Route::post('api/v1/sendMessage', 'Api\V1\Admin\TelegramApiController@sendMessage');

