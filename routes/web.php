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
Route::post('login', 'Auth\LoginController@apilogin')->name('apilogin');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
Route::get('musics', 'AdminController@music')->name('music');
Route::get('albums', 'AdminController@album')->name('album');
Route::get('events', 'AdminController@event')->name('event');
Route::get('users', 'AdminController@user');
});

Route::get('/admin', 'AdminController@index')->middleware('auth')->name('home');
Route::get('/musics', 'PagesController@music')->name('songs');
Route::get('music/{slug}', 'PagesController@showmusic');

Route::get('/albums', 'PagesController@album')->name('albums');
Route::get('album/{id}', 'PagesController@showalbum');
Route::get('/contact', 'PagesController@contact');
Route::get('events', 'PagesController@events');

