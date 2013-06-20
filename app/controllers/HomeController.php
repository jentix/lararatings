<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showHome()
	{
		
		$ratings = DB::table('sites')->get();

		// var_export($ratings);
		
		$this->layout->content = View::make('home', array('ratings' => $ratings));
	}

}