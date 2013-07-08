<?php

class AddController extends BaseController {

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		if (Auth::check()){
			$data['login'] = true;		
		}
		else {
			$data['login'] = false;
		}

		$this->layout = View::make('add')->with($data);
	}
}