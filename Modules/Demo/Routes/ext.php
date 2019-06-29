<?php

/*
|--------------------------------------------------------------------------
| Ext Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "ext" middleware group.
|
*/

Route::prefix('demo')->group(function() {
    Route::get('/', 'Ext\DemoController@index');
});
