<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/users/me')->group(function () {
    Route::get('/', 'UserController@show');

    Route::prefix('/items')->group(function () {
        Route::get('/', 'UserItemController@index');
        Route::get('/{item}', 'UserItemController@show');
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', 'UserCategoryController@index');
        Route::get('/{category}', 'UserCategoryController@show');
    });
});

Route::resource('/items', 'ItemController')->only(['index', 'show']);
Route::resource('/categories', 'CategoryController')->only(['index', 'show']);
