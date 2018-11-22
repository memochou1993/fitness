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

// Route::get('/users/{user}', 'UserController@show');
Route::get('/items/{item}', 'ItemController@show');

Route::prefix('/users/{user}/items')->group(function () {
    Route::get('/', 'UserItemController@index');
    Route::get('/{item}', 'UserItemController@show');
});

// Route::prefix('/items/{item}/users')->group(function () {
//     Route::get('/', 'ItemUserController@index');
//     Route::get('/{user}', 'ItemUserController@show');
// });
