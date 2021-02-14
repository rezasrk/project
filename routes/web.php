<?php

use Illuminate\Support\Facades\Route;


Route::get('img_captcha', 'Controller@captcha');

Route::prefix('managerpanel')->group(function () {
    Route::get('/', 'Auth\LoginController@loginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('dashboard', 'DashboardController')->name('dashboard')->middleware('auth');
    /*--------------------------------------------------------------------------------------------------------------------------------
     *                                         Auth Section
     * -------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->namespace('Auth')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('logout');
        Route::get('profile', 'ProfileController@showProfile')->name('profile.show');
        Route::post('change_information', 'ProfileController@changeInformation')->name('change.information');
        Route::post('change_password', 'ProfileController@changePassword')->name('change.password');
    });

    /*----------------------------------------------------------------------------------------------------------------------------------
     *                                         Settings Section
     * ---------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->namespace('Settings')->prefix('settings')->group(function () {
        Route::resource('roles', 'RolesController')->except(['show']);
        Route::resource('admins', 'AdminController')->except('show', 'destroy');
    });

    Route::get('simple/download', 'DownloadController@simpleDownload')->name('simple.download');

    /*----------------------------------------------------------------------------------------------------------------------------------
     *                                         Category Section
     * ---------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->group(function () {
        Route::resource('categories', 'CategoryController');
        Route::get('get_parent','CategoryController@getParentCategory')->name('category.parent');
    });
});
