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

Route::resource('/items', 'ItemController')->except([
    'create', 'edit',
]);

Route::prefix('/items')->group(function () {
    //
});

Route::resource('/users', 'UserController')->except([
    'create', 'edit',
]);

Route::prefix('/users/me/items')->group(function () {
    Route::get('/', 'UserItemController@index');
    Route::get('/{item}', 'UserItemController@show');
});
