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

Route::prefix('marriage')->group(function() {
    Route::get('/', 'MarriageController@index');
    Route::get('/create', 'MarriageController@create')->name('marriage.create');
    Route::post('/register', 'MarriageController@store')->name('marriage.register');
});
