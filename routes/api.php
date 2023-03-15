<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'users'], function() {
        Route::post('','API\UserController@add');
        Route::get('/{id}','API\UserController@get');
        Route::get('/all','API\UserController@getAll');
        Route::post('','API\UserController@edit');
        Route::delete('/{id}','API\UserController@delete');
    });
});
