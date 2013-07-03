<?php

Route::get('/', 'HomeController@showHome');

Route::get('new', 'HomeController@showNew');

Route::get('add', 'AddController@showAdd');

Route::get('login', 'LoginController@login');

Route::post('touch', 'TouchController@clientTouch');