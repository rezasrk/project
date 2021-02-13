<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Auth\LoginController@loginForm');

Route::get('img_captcha', 'Controller@captcha');

Route::prefix('managerpanel')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('dashboard', 'DashboardController')->name('dashboard')->middleware('auth');
    /*------------------------------------------------------------------------------------------------------------------------------------------------------
     *                                         Auth Section
     * -----------------------------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->namespace('Auth')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('logout');
        Route::get('profile', 'ProfileController@showProfile')->name('profile.show');
        Route::post('change_information', 'ProfileController@changeInformation')->name('change.information');
        Route::post('change_password', 'ProfileController@changePassword')->name('change.password');
    });

    /*------------------------------------------------------------------------------------------------------------------------------------------------------
     *                                         Settings Section
     * -----------------------------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware('auth')->namespace('Settings')->prefix('settings')->group(function () {
        Route::resource('roles', 'RolesController')->except(['show']);
        Route::resource('users', 'UsersController')->except('show', 'destroy');
        Route::get('login_via_user/{id}', 'UsersController@loginAsUser')->name('loginAsUser');
    });


    /*-------------------------------------------------------------------------------------------------------------------------------------------------------
     *                                         Supply Section
     * ------------------------------------------------------------------------------------------------------------------------------------------------------
     */
    Route::middleware(['auth'])->namespace('Supply')->prefix('supply')->group(function () {
        Route::resource('categories', 'CategoriesController')->except('show', 'destroy');
        Route::post('categories/unit', 'CategoriesController@unit')->name('categories.unit');
        Route::get('categories/search', 'CategoriesProcessController@search')->name('categories.search');
        Route::get('categories/transfer', 'CategoriesTransferController@transferForm')->name('categories.transfer.form');
        Route::post('categories/transfer', 'CategoriesTransferController@transfer')->name('categories.transfer');
        Route::resource('request', 'RequestsController')->except('destroy', 'show');
        Route::get('my_request', 'RequestsController@myRequest')->name('my.requests');
        Route::get('warehouse', 'WarehouseController@warehouse')->name('warehouse');
        Route::get('mrs/{requestId}', 'WarehouseController@mrsShow')->name('mrs.show');
        Route::post('mrs', 'WarehouseController@mrs')->name('mrs');
        Route::get('miv/{categoryId}/{requestId?}', 'WarehouseController@showMiv')->name('miv.show');
        Route::post('miv', 'WarehouseController@miv')->name('miv');
        Route::get('mrv/{categoryId}', 'WarehouseController@showMrv')->name('mrv.show');
        Route::post('mrv', 'WarehouseController@mrv')->name('mrv');
        Route::post('action/{id}', 'RequestActionController@action')->name('action');
        Route::post('attachment', 'RequestActionController@attachment')->name('action.attachment');
        Route::post('assign', 'RequestActionController@assign')->name('action.assign');
        Route::get('assign_form', 'RequestActionController@assignForm')->name('action.assignForm');
        Route::get('get_user', 'RequestActionController@getUser')->name('action.get.user');
        Route::post('assign_user', 'RequestActionController@assignUser')->name('assign.user');
        Route::get('attachment/show', 'RequestActionController@attachmentShow')->name('action.attachmentShow');
        Route::get('request_print', 'RequestActionController@requestPrint')->name('action.requestPrint');
        Route::get('request_comment/form', 'RequestActionController@commentForm')->name('action.requestCommentForm');
        Route::post('request_comment', 'RequestActionController@comment')->name('action.requestComment');
        Route::post('storedetail', 'StoreDetailController@store')->name('storedetail.store');
        Route::post('pricedetail', 'StoreDetailController@price')->name('pricedetail.price');
        Route::get('financial', 'FinancialController@index')->name('supply.financial.index');
    });

    Route::middleware(['auth'])->namespace('Reports')->prefix('report')->group(function () {
        Route::get('warehouse', 'SupplyReportController@warehouse')->name('report.warehouse');
    });

    Route::post('switch', 'Controller@projectSwitch')->name('project.switch');

    Route::get('simple/download', 'DownloadController@simpleDownload')->name('simple.download');
});
