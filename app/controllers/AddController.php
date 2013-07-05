<?php

class AddController extends BaseController {

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		if (Auth::check()){
			$data['login'] = true;		

			$this->layout = View::make('add')->with($data);
		}
		else {
			$data['auth_but'] = true;

			$this->layout = View::make('add')->with($data);
		}

	}
}