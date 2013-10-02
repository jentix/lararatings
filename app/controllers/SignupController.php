<?php

class SignupController extends BaseController {
	
	public function showform() {
		// если авторизирован перекинем на главную
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			// показываем форму
			$data = array('main_menu' => 'empty'); 
			$data['base'] = URL::to('/');
			$this->layout = View::make('signup')->with($data);
		}
	}
	
	public function register() {
		// сама регистрация
		$data = array('main_menu' => 'empty'); 
		$data['base'] = URL::to('/');
		
		$input = Input::all();
		// валидация
		$rules = array(
			'email' => 'required|email|unique:users',
			'psw'   => 'required|between:5,40',
			'2psw'  => 'required|between:5,40|same:psw',
			'agree' => 'required'
		);
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			// не прошел выводим ошибки
			$messages         = $validation->messages();
			$data['messages'] = $messages->all();
			$this->layout = View::make('signup')->with($data);
		}
		else {
			// добавляем пользователя
			$user = new User;
			$user->email = trim($input['email']);
			$user->password = Hash::make($input['psw']);
			$user->mail_key = md5($input['email']);

			$maildata = array('email' => $input['email'], 'hash' => $user->mail_key);
			// отправляем письмо
			Mail::send('emails.welcome', $maildata, function($message)use($maildata)
			{	
			    $message->to($maildata['email'])->subject('Добро пожаловать!');
			});
			
			$user->save();
			Auth::login($user);
			return Redirect::to('/');
		}
	}
}