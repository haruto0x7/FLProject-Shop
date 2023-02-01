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
Route::get('/', function () {
    return view('user._auth.signin');
})->name('index');

Route::get('/signup', function () {
    return view('user._auth.signup');
})->name('signup');

Route::post('/signin', '_AuthController@signin')->name('auth.signin');
Route::post('/signup', '_AuthController@signup')->name('auth.signup');
Route::any('/signout', '_AuthController@signout')->name('auth.signout');

Route::get('/admin', function () {
    return view('admin._auth.signin');
})->name('admin.index');

Route::post('/admin/signin', 'Admin\_AuthController@signin')->name('auth.admin.signin');
Route::any('/admin/signout', 'Admin\_AuthController@signout')->name('auth.admin.signout');

Route::group(['middleware' => 'auth'], function(){

    Route::match(['get', 'post'], '/home', 'HomeController@index')->name('home');
    Route::match(['get', 'post'], '/profile', 'ProfileController@index')->name('profile');
    Route::match(['get', 'post'], '/profile/password', 'ProfileController@password')->name('profile.password');

    Route::group(['prefix' => 'ajax', 'middleware' => 'ajax'], function() {
        Route::match(['get', 'post'], '/getorder', 'HomeController@getorder');
        Route::match(['get', 'post'], '/addorder', 'HomeController@addorder');
    });

    /*
    ADMIN ROUTER:
    -----------------------------------------
    */
    
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {

        Route::match(['get', 'post'], '/home', 'Admin\AnalyticController@index')->name('admin.home');
        Route::match(['get', 'post'], '/shop', 'Admin\ShopController@index')->name('admin.shop');
        Route::match(['get', 'post'], '/style', 'Admin\StyleController@index')->name('admin.style');
        Route::match(['get', 'post'], '/manage', 'Admin\ManageController@index')->name('admin.manage');
        Route::match(['get', 'post'], '/information', 'Admin\InformationController@index')->name('admin.information');
        Route::match(['get', 'post'], '/credit', 'Admin\CreditController@index')->name('admin.credit');

        /*
        ADMIN AJAX ROUTER:
        -----------------------------------------
        */

        Route::group(['prefix' => 'ajax', 'middleware' => 'ajax'], function() {
            Route::match(['get', 'post'], '/getuser', 'Admin\ManageController@getuser');
            Route::match(['get', 'post'], '/edituser', 'Admin\ManageController@edituser');

            Route::match(['get', 'post'], '/getinfo', 'Admin\InformationController@getinfo');
            Route::match(['get', 'post'], '/addinfo', 'Admin\InformationController@addinfo');
            Route::match(['get', 'post'], '/getrowinfo', 'Admin\InformationController@getrowinfo');
            Route::match(['get', 'post'], '/editinfo', 'Admin\InformationController@editinfo');
            Route::match(['get', 'post'], '/deleteinfo', 'Admin\InformationController@deleteinfo');

            Route::match(['get', 'post'], '/getstyle', 'Admin\StyleController@getstyle');
            Route::match(['get', 'post'], '/addstyle', 'Admin\StyleController@addstyle');
            Route::match(['get', 'post'], '/editstyle', 'Admin\StyleController@editstyle');
            Route::match(['get', 'post'], '/deletestyle', 'Admin\StyleController@deletestyle');

            Route::match(['get', 'post'], '/saveorder', 'Admin\ShopController@saveorder');
            Route::match(['get', 'post'], '/deleteorder', 'Admin\ShopController@deleteorder');

            Route::match(['get', 'post'], '/getanalytic', 'Admin\AnalyticController@getanalytic');
            Route::match(['get', 'post'], '/expirylinks', 'Admin\AnalyticController@expirylinks');

            Route::match(['get', 'post'], '/styleorder', 'Admin\ShopController@styleorder');
            Route::match(['get', 'post'], '/getorder', 'Admin\ShopController@getorder');
            Route::match(['get', 'post'], '/getlinks', 'Admin\ShopController@getlinks');
        });
    });
});
