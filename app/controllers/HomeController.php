<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showHome()
	{

		$ratings = Sites::where('id', '>', 0)->take(20)->get();

		// convert dates from timestamp
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}
		
		$data = array('ratings' => $ratings, 'main_menu' => 'all');

		$this->layout = View::make('home')->with($data);
	}

	public function showNew()
	{	
		
		$data = array('main_menu' => 'new');

		$this->layout = View::make('new')->with($data);
	}
}
