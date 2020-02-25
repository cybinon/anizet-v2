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
Route::get('/list', 'MainController@list')->name('list');



Route::get('/test', 'VideoController@list')->name('cloudlist');

Auth::routes(['verify' => true]);




Route::get('/v/{vid}', 'VideoController@show')->name('video.show');
Route::get('/v/{vid}/m', 'VideoController@showm')->name('video.showm');

// Route::match(array('GET', 'POST'),'/register', function(){
//   abort('404');
// })->name('register');

Route::match(array('GET', 'POST'), '/report', 'MainController@report');

Route::match(array('GET', 'POST'), '/p', 'PostController@store')->middleware('verified');;

Route::match(array('GET', 'POST'), '/v', 'PostController@storevid')->middleware('verified');;

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/weight', function(){
    return view('weight');
})->name('profile.show');


//Only Admin Routes
Route::get('/p/create', 'PostController@create')->name('poster')->middleware('verified');
Route::get('/p/{post}', 'MainController@show')->middleware('verified');

Route::get('/v/create', 'PostController@video')->middleware('verified');

Route::get('/p/{post}/edit', 'PostController@edit')->middleware('verified');;
Route::get('/v/{video}/edit', 'PostController@editvid')->name('post.editvid')->middleware('verified');;
Route::get('/v/{video}/delete', 'PostController@deletevid')->name('post.deletevid')->middleware('verified');;
Route::patch('/p/{post}', 'PostController@update')->name('post.update')->middleware('verified');;
Route::patch('/v/{video}', 'PostController@updatevid')->name('post.updatevid')->middleware('verified');;

//Firebase Route
Route::get('/firebase', 'FirebaseController@index');


