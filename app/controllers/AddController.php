<?php

class AddController extends BaseController {

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		if (Auth::check()){
			$data['login'] = true;
			
			if (Input::has('name')) {
				$site = Sites::where('name', '=', Input::get('name'))->first();
				if (!$site) {
					$newsite = new Sites;
					$newsite->name = Input::get('name');
					$newsite->description = Input::get('desc');
					$newsite->link = Input::get('link');
					$newsite->date = time();
					$newsite->save();
				}
			}	
		}
		else {
			$data['login'] = false;
		}

		$this->layout = View::make('add')->with($data);
	}
}