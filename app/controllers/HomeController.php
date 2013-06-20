<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showHome()
	{
		// return View::make('home');
		$this->layout->content = View::make('home');
	}

}