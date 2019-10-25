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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//event
Route::post('event/add', 'AdminController@addevent')->name("addevent");
Route::post('event/update', 'AdminController@editevent')->name("editevent");
Route::post('event/delete', 'AdminController@deleteevent')->name("deleteevent");

//albums
Route::post('album/update', 'AdminController@editalbum')->name("editalbum");
Route::post('album/add', 'AdminController@addalbum')->name("addalbum");
Route::post('album/delete', 'AdminController@deletealbum')->name("deletealbum");

//Music
Route::post('music/update', 'AdminController@editmusic')->name("editmusic");
Route::post('music/add', 'AdminController@addmusic')->name("addmusic");
Route::post('music/delete', 'AdminController@deletemusic')->name("deletemusic");

//Sendmail
Route::post('/sendmail', 'PagesController@sendmail');

//Subscribe to newletter
Route::post('/newsletter/subcribe', 'PagesController@newsletter_subcribe');
