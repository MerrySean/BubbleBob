<?php

use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware('auth')->group(function () {
    Route::get('/user', function (Request $request) {
        return redirect('/');
    });

    Route::get('/logout',   'Auth\LoginController@logout')->name('logout');
    Route::get('/Account',  'PagesController@profile')->name('profile');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'admin']
    ],
    function () {
        //Views
        Route::view('/dashboard',   'pages.admin.dashboard')->name('admin.dashboard');
        Route::get('/users',        'PagesController@usersView')->name('admin.users');
        Route::get('/users/logs',   'PagesController@usersLogsView')->name('admin.users.logs');
        Route::get('/products',     'PagesController@productsView')->name('admin.products');
        Route::get('/sales',        'PagesController@salesView')->name('admin.sales');
        Route::get('/PettyCash',    'PagesController@PettyCashView')->name('admin.PettyCash');
        Route::get('/reports',      'PagesController@reportsView')->name('admin.reports');

        //Data
        Route::post('/product', 'productController@addProduct')->name('admin.products.add');
        Route::get('/getProducts/{type}', 'productController@getProduct')->name('admin.products.get');
        Route::post('/update/product', 'productController@UpdateProduct')->name('admin.products.update');
        Route::post('/delete/product', 'productController@DeleteProduct')->name('admin.products.Delete');

        // sales
        Route::get('/Sales/{id}', 'SalesController@getSaleById')->name('admin.products.get');

        // filter Data
        Route::get('/filter/{model}', 'FilterController@SortByDate')->name('admin.filters');

        //Pocket Money Transaction
        Route::post('/PettyCash', 'SalesController@PettyCash')->name('admin.PettyCash');

        //Register user
        Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
    }
);


Auth::routes();

Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['auth', 'user']
    ],
    function () {
        Route::get('/dashboard', 'PagesController@user_dashboard')->name('user.dashboard');
        Route::get('/customerByName', 'SalesController@customerByName')->name('get.customerByName');
        Route::post('/transactions', 'SalesController@transaction')->name('post.transaction');
    }
);
