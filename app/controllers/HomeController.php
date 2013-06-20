<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showHome()
	{

		$ratings = Sites::all();

		// var_export($ratings);
		
		$this->layout->content = View::make('home', array('ratings' => $ratings));
	}

}