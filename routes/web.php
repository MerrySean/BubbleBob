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

Route::middleware('auth')->group(function () {
    Route::get('/user', function (Request $request) {
        return Auth::User();
    })->name('login');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});




Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin']
    ],
    function () {
        //Views
        Route::view('/dashboard', 'pages.admin.dashboard')->name('admin.dashboard');
        Route::get('/users', 'PagesController@usersView')->name('admin.users');
        Route::get('/users/logs', 'PagesController@usersLogsView')->name('admin.users.logs');
        Route::get('/products', 'PagesController@productsView')->name('admin.products');
        Route::get('/sales', 'PagesController@salesView')->name('admin.sales');
        Route::get('/reports', 'PagesController@reportsView')->name('admin.reports');

        //Data
        Route::post('/product', 'productController@addProduct')->name('admin.products.add');
        Route::get('/getProducts', 'productController@getProduct')->name('admin.products.get');
    }
);


Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['auth', 'user']
    ],
    function () {
        Route::get('/dashboard', 'PagesController@user_dashboard')->name('user.dashboard');
    }
);
