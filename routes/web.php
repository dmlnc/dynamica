<?php

Route::redirect('/', '/login');
Route::redirect('/dashboard', '/admin/dashboard');

Auth::routes(['register' => false]);

// Route::get('/preview', 'Api\V1\Admin\ParseXmlController@getPdf')->name('pdf.preview');

Route::get('service-forms/{type}/{formId}', 'Api\V1\Admin\ServiceFormsApiController@getPdf');

// Route::get('sendMessage', 'Api\V1\Admin\TelegramApiController@sendMessage');

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});
