<?php

Route::redirect('/', '/login');
Route::redirect('/dashboard', '/admin/dashboard');

Auth::routes(['register' => false]);

// Route::get('/preview', 'Api\V1\Admin\ParseXmlController@getPdf')->name('pdf.preview');

// Route::get('test', 'Api\V1\Admin\ParseXmlController@getPdf');

Route::get('sendMessage', 'TelegramBotController@sendMessage');

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'namespace'  => 'Admin',
    'middleware' => ['auth'],
], function () {
    Route::view('/{any?}', 'layouts.admin.app')->name('dashboard')->where('any', '.*');
});
