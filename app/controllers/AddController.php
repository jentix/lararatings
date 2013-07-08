<?php

class AddController extends BaseController {

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');

		if (Auth::check()) {
			$data['login'] = true;
			
			if (Input::has('name')) {
				$input = Input::all();
				$rules = array(
					'name' => 'required|max:60|unique:sites',
					'link'   => 'required|max:80|url',
					'desc'  => 'max:140'
				);
				$validation = Validator::make($input, $rules);
				if ($validation->fails()) {
					$messages         = $validation->messages();
					$data['messages'] = $messages->all();
				}
				else {
					$newsite = new Sites;
					$newsite->name        = Input::get('name');
					$newsite->description = Input::get('desc');
					$newsite->link        = Input::get('link');
					$newsite->date        = time();
					$newsite->save();
					$data['success'] = 'Сайт успешно добавлен';
				}
			}	
		}
		else {
			$data['login'] = false;
		}

		$this->layout = View::make('add')->with($data);
	}
}