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

Route::post('event/add', 'AdminController@addevent')->name("addevent");
Route::post('music/add', 'AdminController@addmusic')->name("addmusic");
Route::post('album/add', 'AdminController@addalbum')->name("addalbum");
Route::post('event/delete', 'AdminController@deleteevent')->name("deleteevent");
Route::post('music/delete', 'AdminController@deleteevent')->name("deletemusic");
Route::post('album/delete', 'AdminController@deleteevent')->name("deleteealbum");
