<?php

use GuzzleHttp\Middleware;

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

Auth::routes();


Route::middleware('guest')->group(function () {
    Route::view('/', 'pages.welcome')->name('login');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin']
    ],
    function () {
        Route::view('/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
    }
);

Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['auth', 'user']
    ],
    function () {
        Route::view('/dashboard', 'pages.user.dashboard')->name('user.dashboard');
    }
);
