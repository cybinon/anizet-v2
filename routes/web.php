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

Route::get('/', 'MainController@main')->name('main');

Route::get('test', 'VideoController@list')->name('cloudlist');

Auth::routes();


Route::get('/p/create', 'PostController@create')->name('poster');
Route::get('/p/{post}', 'MainController@show');

Route::get('/v/create', 'PostController@video')->name('vid.post');
Route::get('/v/{vid}', 'VideoController@show')->name('video.show');

Route::match(array('GET', 'POST'),'/register', function(){
  abort('404');
})->name('register');

Route::match(array('GET', 'POST'), '/p', 'PostController@store');

Route::match(array('GET', 'POST'), '/v', 'PostController@storevid');


Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');


