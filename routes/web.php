<?php
use \App\Http\Middleware\CheckStatus;

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

Route::get('file-upload', 'FirebaseController@wupload');

Route::post('file-upload/upload', 'FirebaseController@upload')->name('upload');


Route::get('/v/create', 'PostController@video')->name('vidpost')->middleware(CheckStatus::class);

Route::get('/', 'MainController@main')->name('main');
Route::get('/list', 'MainController@list')->name('list');



Route::get('/test', 'VideoController@list')->name('cloudlist');

Auth::routes(['verify' => true]);




Route::get('/ads', function(){
    return view("profile.ads");
})->name('ads');

Route::get('/v/{vid}', 'VideoController@show')->name('video.show');
Route::get('/v/{vid}/m', 'VideoController@showm')->name('video.showm');

// Route::match(array('GET', 'POST'),'/register', function(){
    //   abort('404');
    // })->name('register');

    Route::match(array('GET', 'POST'), '/report', 'MainController@report');


    Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
    Route::get('/profile', 'ProfileController@CheckProfile')->middleware('verified');




    //Only Admin Routes

    Route::match(array('GET', 'POST'), '/p', 'PostController@store')->middleware(CheckStatus::class);

    Route::get('/p/create', 'PostController@create')->name('poster')->middleware(CheckStatus::class);

    Route::get('/p/{post}', 'MainController@show');

    Route::match(array('GET', 'POST'), '/v', 'PostController@storevid')->middleware(CheckStatus::class);

    Route::get('/p/{post}/edit', 'PostController@edit')->middleware(CheckStatus::class);
    Route::get('/v/{video}/edit', 'PostController@editvid')->name('post.editvid')->middleware(CheckStatus::class);
    Route::get('/v/{video}/delete', 'PostController@deletevid')->name('post.deletevid')->middleware(CheckStatus::class);

    Route::patch('/p/{post}', 'PostController@update')->name('post.update')->middleware(CheckStatus::class);
    Route::patch('/v/{video}', 'PostController@updatevid')->name('post.updatevid')->middleware(CheckStatus::class);

    //Firebase Route
    Route::get('/firebase', 'FirebaseController@index');


