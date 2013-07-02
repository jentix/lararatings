<?php

class AddController extends BaseController {

	// protected $layout = 'layouts.main';

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		$this->layout = View::make('add')->with($data);
	}
}