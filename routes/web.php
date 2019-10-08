<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', 'PagesController@index');

Route::group(['prefix'=>'admin'], function(){
Route::get('musics', 'AdminController@music');
Route::get('events', 'AdminController@event');
});

Route::get('/dashboard', 'HomeController@index')->name('home');
