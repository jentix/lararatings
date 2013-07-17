<?php

class SignupController extends BaseController {
	
	public function showform() {
		// если авторизирован перекинем на главную
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			$data = array('main_menu' => 'empty'); 
			$data['base'] = URL::to('/');
			$this->layout = View::make('signup')->with($data);
		}
	}
	
	public function register() {
		$data = array('main_menu' => 'empty'); 
		$data['base'] = URL::to('/');
		
		$input = Input::all();
		$rules = array(
			'email' => 'required|email|unique:users',
			'psw'   => 'required|between:5,40',
			'2psw'  => 'required|between:5,40|same:psw',
			'agree' => 'required'
		);
		$validation = Validator::make($input, $rules);

		if ($validation->fails()) {
			$messages         = $validation->messages();
			$data['messages'] = $messages->all();
			$this->layout = View::make('signup')->with($data);
		}
		else {
			$user = new User;
			$user->email = trim($input['email']);
			$user->password = Hash::make($input['psw']);
			$user->mail_key = md5($input['email']);

			$maildata = array('email' => $input['email'], 'hash' => $user->mail_key);
			
			Mail::send('emails.welcome', $maildata, function($message)use($maildata)
			{	
			    $message->to($maildata['email'])->subject('Добро пожаловать!');
			});


			// $subject = "Добро пожаловать на rating fryazino.net!";
   //          $message = "Вы успешно зарегистрировались на сайте http://rating.fryazino.net \n".
   //          "Ваш логин: ".$user->email."\n".
   //          "Для подтверждения регистрации перейдите по ссылке ниже: \n".
   //          "http://rating.fryazino.net/?key=".$user->mail_key."\n\n".
   //          "Если вы не регистрировались на нашем сайте, удалите это сообщение.";
   //          $headers  = "From: office@fryazino.net \r\n";
   //          $headers .= 'Content-Type: text/plain; charset="utf8" \r\n';
   //          mail($user->email, $subject, $message, $headers);

			$user->save();
			Auth::login($user);
			return Redirect::to('/');
		}
	}
}