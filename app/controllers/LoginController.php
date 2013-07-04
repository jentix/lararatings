<?php

class LoginController extends BaseController {

	public function login()
	{	
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			
			$data          = array('main_menu' => 'empty'); // заглушка для активного меню
			$data['login'] = false; // отключить меню для авторизованого пользователя

			if (isset($_POST['enter'])) {
				$input = Input::all();
				
				// запомнить ли пользователя ?
				if (isset($input['remember'])) $remember = true;
					else $remember = false;

				$rules = array(
				    'email' => 'required|email',
				    'psw'  => 'required|between:4,50'
				);
				$validation = Validator::make($input, $rules);

				if ($validation->fails()) {
					$messages = $validation->messages();
					$data['messages'] = $messages->all();
					$this->layout = View::make('login')->with($data);
				}
				else {
					// $data['psw'] = Hash::make('qwerty');
					if (Auth::attempt(array('email' => $input['email'], 'password' => $input['psw']), $remember)) {
					    return Redirect::to('/');
					}
					else {
						$this->layout = View::make('login')->with($data);
					}
				}
			}
			else {
				$this->layout = View::make('login')->with($data);
			}			
		}	
	}
}