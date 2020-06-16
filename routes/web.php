<?php
use \App\Http\Middleware\CheckStatus;



//Main Routes
Route::get('/', 'MainController@main')->name('main');



Auth::routes(['verify' => true]);

Route::prefix('/admin')->group(function(){
Route::get('/', 'AdminController@index')->name('adminindex');

Route::get('/create', 'AdminController@aform')->name('aform');
Route::get('/add/{season}', 'AdminController@vform')->name('vform');

Route::post('/store', 'AdminController@astore')->name('astore');
Route::post('/vstore', 'AdminController@vstore')->name('vstore');

Route::post('/aupdate', 'AdminController@aupdate')->name('aupdate');

Route::get('/edit/season/{season}', 'AdminController@esform')->name('esform');
});



Route::get('/profile', 'ProfileController@index')->name('userget');

Route::match(array('GET', 'POST'), '/report', 'MainController@report');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
