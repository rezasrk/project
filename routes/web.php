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
        Route::get('pages', 'PageController@index')->name('page');
        Route::post('pages', 'PageController@store')->name('pages.store');
        Route::get('information', 'InformationController@index')->name('information');
        Route::post('information', 'InformationController@store')->name('information.store');
        Route::get('guidance', 'GuidanceController@index')->name('guidance');
        Route::post('guidance', 'GuidanceController@store')->name('guidance.store');
        Route::delete('guidance/{id}', 'GuidanceController@destroy')->name('guidance.destroy');
    });

    Route::get('simple/download', 'DownloadController@simpleDownload')->name('simple.download');

    /*----------------------------------------------------------------------------------------------------------------------------------
     *                                         Category Section
     * ---------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->group(function () {
        Route::resource('categories', 'CategoryController');
        Route::get('get_parent', 'CategoryController@getParentCategory')->name('category.parent');
    });

    /*----------------------------------------------------------------------------------------------------------------------------------
    *                                             Avertising Section
    *-----------------------------------------------------------------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::resource('advertising', 'AdvertisingController');
    });

    /*--------------------------------------------------------------------------------------------------------------------------------
    *                                         Contact Us Section
    * --------------------------------------------------------------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::get('contact', 'ContactController@index')->name('contact.index');
    });

    /*---------------------------------------------------------------------------------------------------------------------------------
    *                                          User Section
    *-----------------------------------------------------------------------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        Route::resource('users', 'UserController');
        Route::post('confirm/user/{id}', 'UserController@confirm')->name('users.confirmed');
        Route::post('text_preview/{id}', 'UserController@preview')->name('preview');
    });


    /*-------------------------------------------------------------------------------------------------------------------------------
     *                                         Publisher Section
     ------------------------------------------------------------------------------------------------------------------------------*/
    Route::middleware('auth')->group(function () {
        Route::get('publishers', 'PublisherController@index')->name('publisher.index');
        Route::get('publisher/{id}', 'PublisherController@show')->name('publisher.show');
        Route::get('publishers/edit/{id}', 'PublisherController@edit')->name('publishers.edit');
        Route::patch('publishers/update/{id}', 'PublisherController@update')->name('publisher.update');
        Route::get('publishers/accept', 'PublisherController@accept')->name('publisher.accept');
        Route::get('publishers/normal', 'PublisherController@normal')->name('publisher.normal');
        Route::delete('publishers/delete/{id}','PublisherController@destroy')->name('publishers.destroy');
    });

    /*----------------------------------------------------------------------------------------------------------------------------
     *                                          Journal Section
     ---------------------------------------------------------------------------------------------------------------------------*/
    Route::middleware('auth')->group(function () {
        Route::get('journals', 'JournalController@index')->name('journal.index');
    });


    /*----------------------------------------------------------------------------------------------------------------------------
     *                                          Tags Section
     ---------------------------------------------------------------------------------------------------------------------------*/
    Route::middleware('auth')->group(function () {
        Route::resource('tags', 'TagController');
    });

    /*---------------------------------------------------------------------------------------------------------------------------
     *                                         Cooperator Section
     ----------------------------------------------------------------------------------------------------------------------------*/

    Route::middleware('auth')->group(function () {
        Route::get('cooperator', 'CooperatorController@index')->name('cooperator.index');
        Route::get('cooperator/create', 'CooperatorController@create')->name('cooperator.create');
        Route::post('cooperator', 'CooperatorController@store')->name('cooperator.store');
        Route::post('cooperator/delete/{id}', 'CooperatorController@destroy')->name('cooperators.destroy');
    });
});
