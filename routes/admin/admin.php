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

Route::any('login',  'MainController@login')->name('login');
Route::get('logout', array('as' => 'MainController@logout', 'uses' => "MainController@logout"));

Route::group(array('middleware' => ['auth:admin']), function () {
    // 首页相关
    Route::get('', array('as' => 'MainController@index', 'uses' => "MainController@index"));
    Route::any('welcome', array('as' => 'MainController@welcome', 'uses' => 'MainController@welcome') );
    Route::any('log_index', array('as' => 'LogController@index', 'uses' => 'LogController@index') );
    Route::any('administrator_list', array('as' => 'AdminController@list', 'uses' => 'AdminController@list') );
    Route::any('identity_list', array('as' => 'AdminController@identity_list', 'uses' => 'AdminController@identity_list') );
    Route::any('error_logs',array('as' => 'LogController@errorlog', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index'));
});