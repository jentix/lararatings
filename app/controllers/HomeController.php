<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showHome()
	{

		$ratings = Sites::all();

		// convert dates from timestamp
		foreach ($ratings as $rating) {
			$rating->date = date("d.m.Y" , $rating->date);
		}
		
		$this->layout->content = View::make('home', array('ratings' => $ratings));
	}

}