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
    Route::resource('/categories', 'UserCategoryController')->only(['index', 'show']);
    Route::resource('/items', 'UserItemController')->only(['index', 'show']);
    Route::resource('/records', 'UserRecordController')->only(['index', 'show']);
});

Route::resource('/categories', 'CategoryController')->except(['index', 'show', 'create', 'edit']);

Route::resource('/items', 'ItemController')->except(['index', 'create', 'edit']);

Route::resource('/records', 'RecordController')->except(['index', 'show', 'create', 'edit']);
