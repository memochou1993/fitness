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

Route::resource('/categories', 'CategoryController')
     ->only(['store', 'update', 'destroy']);
Route::resource('/items', 'ItemController')
     ->only(['show', 'store', 'update', 'destroy']);
Route::resource('/records', 'RecordController')
     ->only(['store', 'update', 'destroy']);

Route::prefix('/users/me')->group(function () {
    Route::get('/', 'UserController@show');
    Route::resource('/categories', 'User\CategoryController')
         ->only(['index', 'show']);
    Route::resource('/items', 'User\ItemController')
         ->only(['index', 'show']);
    Route::resource('/records', 'User\RecordController')
         ->only(['index', 'show']);
});
