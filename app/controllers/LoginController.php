<?php

class LoginController extends BaseController {

	public function login()
	{	
		if (Auth::check()) {
			return Redirect::to('/');
		}
		else {
			
			$data = array('main_menu' => 'empty'); // заглушка для активного меню
			$data['base'] = URL::to('/');

			if (isset($_POST['enter'])) {
				$input = Input::all();
				
				// запомнить ли пользователя ?
				if (isset($input['remember'])) $remember = true;
					else $remember = false;

				$rules = array(
				    'email' => 'required|email',
				    'psw'  => 'required|between:5,40'
				);
				$validation = Validator::make($input, $rules);

				if ($validation->fails()) {
					$messages = $validation->messages();
					$data['messages'] = $messages->all();
					$this->layout = View::make('login')->with($data);
				}
				else {
					
					if (Auth::attempt(array('email' => $input['email'], 'password' => $input['psw']), $remember)) {
					    return Redirect::to('/'); // если зашел
					}
					else {
						$data['messages'] = array('ошибка' => 'неверный логин/пароль');
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