<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('dashboard.content.index', ['page' => 'index']);
// });

Route::auth();

Route::get('/', function(){ return redirect('/home'); });

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'dashboard'], function(){
    Route::get('home', 'DashboardController@home');

    Route::get('workflow', 'DashboardController@workflow');

    Route::get('customers', 'DashboardController@customers');

    Route::get('inventory', 'DashboardController@inventory');

    Route::get('analytics', 'DashboardController@analytics');

    Route::get('profile', 'DashboardController@profile');
});

Route::group(['prefix' => 'api'], function(){
    Route::group(['prefix' => 'customers'], function(){
        Route::get('/', 'Api\CustomerController@get');
        
        Route::post('/', 'Api\CustomerController@create');
        
        Route::put('/', 'Api\CustomerController@update');

        Route::delete('/', 'Api\CustomerController@delete');        
    });

    Route::group(['prefix' => 'inventory'], function(){
        Route::get('/', 'Api\InventoryController@get');
        
        Route::post('/', 'Api\InventoryController@create');
        
        Route::put('/', 'Api\InventoryController@update');

        Route::delete('/', 'Api\InventoryController@delete');        
    });

    Route::group(['prefix' => 'orders'], function(){
        Route::get('/', 'Api\OrderController@get');
        
        Route::post('/', 'Api\OrderController@create');
        
        Route::put('/', 'Api\OrderController@update');

        Route::delete('/', 'Api\OrderController@delete');        
    });

    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'Api\ProductController@get');
        
        Route::post('/', 'Api\ProductController@create');
        
        Route::put('/', 'Api\ProductController@update');

        Route::delete('/', 'Api\ProductController@delete');        
    });
});