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
    Route::get('profile/publisher', 'ProfileController@publisher')->name('front.publisher');
    Route::post('profile/publisher', 'ProfileController@publisherStore')->name('front.publisher.store');
    Route::get('profile/journal', 'ProfileController@journal')->name('front.journal');
    Route::post('profile/journal', 'ProfileController@journalStore')->name('front.journal.store');
    Route::post('profile/journal/numbers', 'ProfileController@journalNumberStore')->name('journalNumberStore');
    Route::get('profile/article', 'ProfileController@article')->name('front.article');
    Route::post('profile', 'ProfileController@articleStore')->name('front.article.store');


});

/*-------------------------------------------------------------------------------------------------------
 *                                          General Section
 -------------------------------------------------------------------------------------------------------*/
Route::get('get_numbers_journal', 'Controller@getJournalNumbers')->name('getJournalNumbers');
Route::get('get_category_child', 'Controller@getCategoryChild')->name('getCategoryChild');
Route::get('about', 'Front\PageController@about')->name('front.about');
Route::get('rule', 'Front\PageController@rule')->name('front.rule');
Route::get('contact', 'Front\ContactController@index')->name('contact');
Route::post('contact', 'Front\ContactController@store')->name('contact.store');
Route::get('guidance','Front\GuidanceController@index')->name('front.guidance');
Route::get('creators','Front\CreatorController@index')->name('front.creator');
Route::get('page/publishers','Front\PublisherController@index')->name('front.page.publisher');
Route::get('page/publishers/{id}','Front\PublisherController@show')->name('front.page.publisher.show');
Route::get('page/journals','Front\JournalController@index')->name('front.page.journal');
Route::get('page/journals/{id}','Front\JournalController@show')->name('front.page.journal.show');
Route::get('page/articles','Front\ArticleController@index')->name('front.page.article');
Route::get('page/articles/{id}','Front\ArticleController@show')->name('front.page.article.show');
Route::get('page/article/download','Front\ArticleController@download')->name('article.download');


