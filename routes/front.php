<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('register','RegisterController@register')->name('register');
    Route::get('verify_email/{token}','RegisterController@verify')->name('verify_email');
});

