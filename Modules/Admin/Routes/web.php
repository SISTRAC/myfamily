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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
});
Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('register', 'AdminController@create')->name('admin.register');
  Route::post('register', 'AdminController@store')->name('admin.register.store');
  Route::get('login', 'Auth\LoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
  Route::post('logout', 'Auth\LoginController@logout')->name('admin.auth.logout');
});
