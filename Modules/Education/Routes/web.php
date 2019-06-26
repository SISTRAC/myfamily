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

Route::prefix('education')->group(function() {
    Route::get('/', 'EducationController@verify')->name('education');
    Route::get('/dashboard', 'EducationController@index')->name('education.dashboard');
    Route::get('/login', 'Auth\EducationLoginController@login')->name('education.auth.login');
    Route::post('/login', 'Auth\EducationLoginController@loginEducation')->name('education.login');
    Route::post('logout', 'Auth\EducationLoginController@logout')->name('education.auth.logout');
});
