<?php

Route::get('/', 'HomeController@showHome');

Route::get('new', 'HomeController@showNew');

Route::get('add', 'AddController@showAdd');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@login');

Route::get('signup', 'SignupController@showform');
Route::post('signup', 'SignupController@register');

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::post('touch', 'TouchController@clientTouch');