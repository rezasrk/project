<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('verify_email/{token}', 'RegisterController@verify')->name('verify_email');
    Route::post('front/login', 'AuthController@login')->name('front.login');
    Route::get('front/logout', 'AuthController@logout')
        ->name('front.logout')
        ->middleware('auth:front');
    /*-------------------------------------------------------------------------------------------------------
     *                                            Profile Section
     ------------------------------------------------------------------------------------------------------*/
    Route::get('profile/info', 'ProfileController@info')->name('front.profile');
    Route::post('profile/info', 'ProfileController@infoStore')->name('front.info.store');
    Route::get('profile/journal', 'ProfileController@journal')->name('front.journal');
    Route::post('profile/journal','ProfileController@journalStore')->name('front.journal.store');
});

