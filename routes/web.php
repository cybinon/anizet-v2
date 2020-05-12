<?php
use \App\Http\Middleware\CheckStatus;



//Main Routes
Route::get('/', 'MainController@main')->name('main');



Auth::routes(['verify' => true]);

Route::get('/test/{id}', 'MainController@test')->name('anime.show');
//Report Route

Route::match(array('GET', 'POST'), '/report', 'MainController@report');
