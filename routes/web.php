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
    Route::get('/operations', 'DashboardController@operations')->name('dashboard.operations');
    
    Route::namespace('Messages')->prefix('messages')->group(function() {
        Route::get('/', 'MessageController@index')->name('messages');
        Route::get('/start', 'MessageController@start')->name('messages.start');
        Route::post('/', 'MessageController@create')->name('messages.create');
        Route::get('/thread/{id}', 'MessageController@thread')->name('messages.thread');
        Route::post('/thread/{id}', 'MessageController@update')->name('messages.update');
    });
});
