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

// Route::resource('/user_items', 'UserItemController');

Route::get('/users/{user_id}', 'UserController@index');
Route::get('/users/{user_id}/records', 'UserItemController@index');
