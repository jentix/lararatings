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

		if (Auth::check()) $data['login'] = true;

		$this->layout = View::make('home')->with($data);
	}

	public function showNew()
	{	
		$ratings = Sites::where('id', '>', 0)->orderBy('id', 'desc')->paginate(20);
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}

		$data = array('ratings' => $ratings, 'main_menu' => 'new');

		if (Auth::check()) $data['login'] = true;

		$this->layout = View::make('new')->with($data);
	}
}
