<?php

class LoginController extends BaseController {

	public function login()
	{	
		if (Auth::check()){
			return Redirect::to('/');
		}
		else {
			
			$data     = array('main_menu' => 'empty');
			$data['login'] = false;
			$email    =  Input::get('email');
			$password =  Input::get('psw');
			
			if (isset($_POST['remember'])) $data['remember'] = true;
				else $data['remember'] = false;

			$data['psw'] = Hash::make('qwerty');


			if (Auth::attempt(array('email' => $email, 'password' => $password), $data['remember'])) {
			    return Redirect::to('/');
			}
			else {
				$this->layout = View::make('login')->with($data);
			}
			
		}	
	}
}