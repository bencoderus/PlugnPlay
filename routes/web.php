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
Route::get('musics', 'AdminController@music')->name('music');
Route::get('albums', 'AdminController@album')->name('album');
Route::get('events', 'AdminController@event')->name('event');
Route::get('users', 'AdminController@user');
});

Route::get('/admin', 'HomeController@index')->name('home');
