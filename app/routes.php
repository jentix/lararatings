<?php

Route::get('/', 'HomeController@showHome');

Route::get('new', 'HomeController@showNew');

Route::get('add', 'AddController@showAdd');