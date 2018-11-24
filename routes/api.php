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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/items', 'ItemController');
Route::prefix('/items')->group(function () {
    //
});

Route::resource('/users', 'UserController');
Route::prefix('/users/{user}/items')->group(function () {
    Route::get('/', 'UserItemController@index');
    Route::get('/{item}', 'UserItemController@show');
});
