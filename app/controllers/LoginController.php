<?php

class LoginController extends BaseController {

	public function login()
	{	
		if (Auth::check()){
			return Redirect::intended('home');
		}
		else {
			$data = array('main_menu' => 'empty');

			$this->layout = View::make('login')->with($data);
			
		}	
	}
}