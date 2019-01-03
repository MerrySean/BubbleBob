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

Route::middleware('guest')->group(function () {
    Route::view('/', 'pages.welcome')->name('login');
});

// Route::view('/admin', 'pages.admin');

// Route::namespace('Auth')->group(function () {
//     Route::post('/login', 'LoginController@login');
// });


Route::middleware('auth')->group(function () {
    Route::get('/admin', 'AdminController@view');
});


Route::view('/home', 'pages.home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
