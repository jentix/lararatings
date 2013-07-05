<?php

class SignupController extends BaseController {
	
	public function showform() {
		// если авторизирован перекинем на главную
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			$data = array('main_menu' => 'empty'); 

			$this->layout = View::make('signup')->with($data);
		}
	}
	
	public function register() {
		$data = array('main_menu' => 'empty'); 

		$input = Input::all();
		$rules = array(
			'email' => 'required|email|unique:users',
			'psw'   => 'required|between:5,40',
			'2psw'  => 'required|between:5,40|same:psw'
		);
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$messages         = $validation->messages();
			$data['messages'] = $messages->all();
			$this->layout = View::make('signup')->with($data);
		}
		else {
			$user = new User;
			$user->email = $input['email'];
			$user->password = Hash::make($input['psw']);
			$user->reg_hash = md5($input['email']);
			$user->save();
			Auth::login($user);
			return Redirect::to('/');
		}
	}
}