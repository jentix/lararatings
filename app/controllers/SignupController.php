<?php

class SignupController extends BaseController {
	public function showform() {
		$data          = array('main_menu' => 'empty'); 
		$data['login'] = false;

		$this->layout = View::make('signup')->with($data);
	}
	public function register() {
		$data          = array('main_menu' => 'empty'); 
		$data['login'] = false;

		$this->layout = View::make('signup')->with($data);
	}
}