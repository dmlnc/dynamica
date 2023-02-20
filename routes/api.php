<?php

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
});

Route::post('api/v1/sendMessage', 'TelegramBotController@sendMessage');

