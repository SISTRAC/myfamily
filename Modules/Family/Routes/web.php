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

Route::prefix('family')->middleware('auth')->group(function() {

    Route::middleware('hasFamily')->group(function() {
	    Route::post('/account', 'FamilyController@store')->name('family.store');
	    Route::get('/', 'FamilyController@create')->name('family.create');
    });
    
});
