<?php

class HomeController extends BaseController {

	// protected $layout = 'layouts.main';

	public function showHome()
	{
		
		$ratings = Sites::where('id', '>', 0)->orderBy('views_mean', 'desc')->orderBy('views_all', 'desc')->orderBy('views_day', 'desc')->paginate(20);

		// convert dates from timestamp
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}
		
		$data = array('ratings' => $ratings, 'main_menu' => 'all');
		$data['base'] = URL::to('/');

		if (Auth::check()) $data['login'] = true;

		// подтверждение почты и вывод сообщения 
		if ((Input::has('key')) and (Auth::check())) {
			$user = User::find(Auth::user()->id);
			$hash = $user->mail_key;
			if ($hash == Input::get('key')) {
				$user->mail_key = 0;
				$user->save();
				$data['email_check'] = 'Электронная почта успешно подтверждена';
			}
			else $data['email_check'] = 'Неправильный ключ подтверждения';
		}
		else if (Input::has('key')) $data['email_check'] = 'Авторизуйтесь и снова пройдите по ссылке в письме';

		$this->layout = View::make('home')->with($data);
	}

	public function showNew()
	{	
		$ratings = Sites::where('id', '>', 0)->orderBy('date', 'desc')->paginate(20);
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}

		$data = array('ratings' => $ratings, 'main_menu' => 'new');
		$data['base'] = URL::to('/');
		
		if (Auth::check()) $data['login'] = true;

		$this->layout = View::make('new')->with($data);
	}
}
