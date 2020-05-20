<?php
use \App\Http\Middleware\CheckStatus;



//Main Routes
Route::get('/', 'MainController@main')->name('main');



Auth::routes(['verify' => true]);

Route::get('/admin', 'AdminController@index')->name('adminindex');

Route::get('/admin/create', 'AdminController@aform')->name('aform');
Route::get('/admin/add/{season}', 'AdminController@vform')->name('vform');

Route::post('/admin/store', 'AdminController@astore')->name('astore');
Route::post('/admin/vstore', 'AdminController@vstore')->name('vstore');

Route::get('/profile', 'ProfileController@index')->name('userget');

//Report Route
Route::match(array('GET', 'POST'), '/report', 'MainController@report');

