<?php

Route::get('/', 'HomeController@showHome');

Route::get('new', 'HomeController@showNew');

Route::get('add', 'AddController@showAdd');

Route::get('login', 'LoginController@login');
Route::post('login', 'LoginController@login');

Route::get('signup', 'SignupController@showform');
Route::post('signup', 'SignupController@register');
// выход
Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

// страница отправки письма для восстановления пароля
Route::get('remind', function(){
	return View::make('reminder', array('main_menu' => 'empty', 'base' => URL::to('/')));
});
Route::post('remind', function(){
	$credentials = array('email' => Input::get('email'));
	return Password::remind($credentials); 
});
// страница восстановления пароля
Route::get('password/reset/{token}', function($token)
{
    return View::make('reset')->with(array('token' => $token, 'main_menu' => 'empty', 'base' => URL::to('/')));
    //'token', $token
});
Route::post('password/reset/{token}', function()
{
    $credentials = array('email' => Input::get('email'));

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to('/');
    });
});

// сюда отправляются ajax запросы для регистрации посещений
Route::post('touch', 'TouchController@clientTouch');

//ajax controller
Route::post('ajax/getMySites', 'AjaxController@getMySites');