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


Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/weight', function(){
    return view('weight');
})->name('profile.show');

use \App\Http\Middleware\CheckStatus;
//Only Admin Routes
Route::match(array('GET', 'POST'), '/p', 'PostController@store')->middleware(CheckStatus::class);
Route::match(array('GET', 'POST'), '/v', 'PostController@storevid')->middleware(CheckStatus::class);

Route::get('/p/create', 'PostController@create')->name('poster')->middleware(CheckStatus::class);
Route::get('/p/{post}', 'MainController@show')->middleware(CheckStatus::class);

Route::get('/v/create', 'PostController@video')->name('vid.post')->middleware(CheckStatus::class);

Route::get('/p/{post}/edit', 'PostController@edit')->middleware(CheckStatus::class);
Route::get('/v/{video}/edit', 'PostController@editvid')->name('post.editvid')->middleware(CheckStatus::class);
Route::get('/v/{video}/delete', 'PostController@deletevid')->name('post.deletevid')->middleware(CheckStatus::class);
Route::patch('/p/{post}', 'PostController@update')->name('post.update')->middleware(CheckStatus::class);
Route::patch('/v/{video}', 'PostController@updatevid')->name('post.updatevid')->middleware(CheckStatus::class);

//Firebase Route
Route::get('/firebase', 'FirebaseController@index');


