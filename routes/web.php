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
Route::group(['prefix'=>'admin'], function(){
Route::get('musics', 'AdminController@music')->name('music');
Route::get('albums', 'AdminController@album')->name('album');
Route::get('events', 'AdminController@event')->name('event');
Route::get('users', 'AdminController@user');
});

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('music', 'PagesController@music');


Route::get('/api', function(){
//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL, 'http://numbersapi.com/5/trivia');
// Execute
$result=curl_exec($ch);

if(curl_errno($ch))
{
die("Could not connect to api");
}
else{
    return $result;
}
// Closing
curl_close($ch);

});
