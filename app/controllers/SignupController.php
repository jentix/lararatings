<?php

class SignupController extends BaseController {
	
	public function showform() {
		// если авторизирован перекинем на главную
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			$data          = array('main_menu' => 'empty'); 
			$data['login'] = false;

			$this->layout = View::make('signup')->with($data);
		}
	}
	
	public function register() {
		$data          = array('main_menu' => 'empty'); 
		$data['login'] = false;

		$this->layout = View::make('signup')->with($data);
	}
}