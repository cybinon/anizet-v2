<?php
use \App\Http\Middleware\CheckStatus;



//Main Routes
Route::get('/', 'MainController@main')->name('main');



Auth::routes(['verify' => true]);

Route::get('/admin', 'AdminController@index')->name('userget');
Route::get('/admin/create', 'AdminController@aform')->name('userget');
Route::get('/admin/add/{season}', 'AdminController@vform')->name('userget');
Route::post('/admin/store', 'AdminController@astore')->name('userget');

Route::get('/profile', 'ProfileController@index')->name('userget');

//Report Route
Route::match(array('GET', 'POST'), '/report', 'MainController@report');

