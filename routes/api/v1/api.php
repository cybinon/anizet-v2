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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Users
Route::prefix('/user')->group(function(){
    Route::post('/login','api\v1\LoginController@login');
    Route::middleware('auth:api')->get('/all', 'api\v1\user\UserController@index');
    Route::middleware('auth:api')->get('/currentUser', 'api\v1\user\UserController@currentUser');
});

Route::prefix('/novel')->group(function(){
    Route::get('/all', 'api\v1\novel\NovelController@index');
    Route::get('/show/{id}', 'api\v1\novel\NovelController@show');
});
//Animes
Route::prefix('/anime')->group(function(){
    Route::get('/all', 'api\v1\anime\AnimeController@index');
    Route::get('/status/new', 'api\v1\anime\AnimeController@statusnew');
    Route::get('/status/plan', 'api\v1\anime\AnimeController@statusplan');
    Route::get('/status/finisht', 'api\v1\anime\AnimeController@statusfinisht');
    Route::get('/select/{id}', 'api\v1\anime\AnimeController@select');
    Route::get('/video/{id}', 'api\v1\anime\AnimeController@video');
    Route::get('/search', 'api\v1\anime\AnimeController@search');
    Route::get('/banner', 'api\v1\anime\AnimeController@banner');
    //Route::middleware('auth:api')->get('/currentanime', 'api\v1\anime\AnimeController@currentUser');
});
