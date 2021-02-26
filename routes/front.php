<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('register','RegisterController@register')->name('register');
    Route::get('verify_email/{token}','RegisterController@verify')->name('verify_email');
    Route::post('front/login','AuthController@login')->name('front.login');
    Route::get('front/logout','AuthController@logout')->name('front.logout')->middleware('auth:front');
});

