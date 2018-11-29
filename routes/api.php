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
    Route::resource('/items', 'UserItemController')->except(['create', 'edit']);
    Route::resource('/categories', 'UserCategoryController')->except(['create', 'edit']);
});

Route::get('/items/{item}', 'ItemController@show');
Route::get('/categories/{category}', 'CategoryController@show');
