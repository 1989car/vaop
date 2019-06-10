<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    
    Route::namespace('Operations')->prefix('operations')->group(function() {
        Route::get('/', 'DashboardController@index')->name('operations');
    });
    
    Route::namespace('Messages')->prefix('messages')->group(function() {
        Route::get('/', 'MessageController@index')->name('messages');
        Route::get('/start', 'MessageController@start')->name('messages.start');
        Route::post('/', 'MessageController@create')->name('messages.create');
        Route::get('/thread/{id}', 'MessageController@thread')->name('messages.thread');
        Route::post('/thread/{id}', 'MessageController@update')->name('messages.update');
    });
    
    Route::namespace('Account')->prefix('account')->group(function() {
        Route::get('/settings', 'SettingsController@index')->name('account.settings');
    });
    
    // Utility Endpoints
    Route::post('/notifications/markallread','NotificationController@markallread')->name('notifications.markallread');
});
