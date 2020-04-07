<?php
use \App\Http\Middleware\CheckStatus;


//Only Admin Routes
Route::get('/v/create', 'PostController@video')->name('vidpost')->middleware(CheckStatus::class);

Route::match(array('GET', 'POST'), '/p', 'PostController@store')->middleware(CheckStatus::class);

Route::get('/p/create', 'PostController@create')->name('poster')->middleware(CheckStatus::class);


Route::match(array('GET', 'POST'), '/v', 'PostController@storevid')->middleware(CheckStatus::class);

Route::get('/p/{post}/edit', 'PostController@edit')->middleware(CheckStatus::class);
Route::get('/v/{video}/edit', 'PostController@editvid')->name('post.editvid')->middleware(CheckStatus::class);
Route::get('/v/{video}/delete', 'PostController@deletevid')->name('post.deletevid')->middleware(CheckStatus::class);

Route::patch('/p/{post}', 'PostController@update')->name('post.update')->middleware(CheckStatus::class);
Route::patch('/v/{video}', 'PostController@updatevid')->name('post.updatevid')->middleware(CheckStatus::class);

Route::get('/n/create', 'NovelController@create')->name('novpost')->middleware('verified');
Route::match(array('GET', 'POST'), '/n', 'NovelController@store')->middleware('verified');


//Main Routes
Route::get('/', 'MainController@main')->name('main');
Route::get('/list', 'MainController@list')->name('list');


//Test Routes                                                            Don't Forget delete
Route::get('/test', 'TestController@index')->name('test');

Auth::routes(['verify' => true]);

//Report Route

Route::match(array('GET', 'POST'), '/report', 'MainController@report');

//Users Route
Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show');
Route::get('/profile', 'ProfileController@CheckProfile')->middleware('verified');




//Additional Routes

Route::get('/ads', function(){
    return view("profile.ads");
})->name('ads');

Route::get('/p/{post}', 'MainController@show');

Route::get('/v/{vid}', 'VideoController@show')->name('video.show');
Route::get('/v/{vid}/m', 'VideoController@showm')->name('video.showm');


Route::get('/n/{novel}', 'NovelController@show');






