<?php

class AddController extends BaseController {

	// protected $layout = 'layouts.main';

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		if (Auth::check()){
			$data['auth_but'] = false;

			$this->layout = View::make('add')->with($data);
		}
		else {
			$data['auth_but'] = true;

			$this->layout = View::make('add')->with($data);
		}

		
	}
}