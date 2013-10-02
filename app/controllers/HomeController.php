<?php

class HomeController extends BaseController {

	// protected $layout = 'layouts.main';

	public function showHome()
	{
		// получаем сайты с пагинацией
		$ratings = Sites::where('id', '>', 0)->orderBy('views_mean', 'desc')->orderBy('views_all', 'desc')->orderBy('views_day', 'desc')->paginate(30);

		// convert dates from timestamp
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}
		// стандартные значения для представления
		$data = array('ratings' => $ratings, 'main_menu' => 'all');
		$data['base'] = URL::to('/');

		if (Auth::check()) $data['login'] = true; // если залогинен показать пункты меню

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
		else if (Input::has('key')) $data['email_check'] = 'Войдите на сайт и снова перейдите по ссылке в письме';

		$this->layout = View::make('home')->with($data);
	}

	public function showNew()
	{	
		// вывод сайтов по дате
		$ratings = Sites::where('id', '>', 0)->orderBy('date', 'desc')->paginate(30);
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}

		$data = array('ratings' => $ratings, 'main_menu' => 'new');
		$data['base'] = URL::to('/');
		
		if (Auth::check()) $data['login'] = true;

		$this->layout = View::make('new')->with($data);
	}
}
