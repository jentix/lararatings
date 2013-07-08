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

			$sites_per_page = 3;
			$sites_count = Sites::where('user_id', '=', Auth::user()->id)->count();
			if ($sites_count > $sites_per_page) $data['get_more_site'] = $sites_per_page;

			$sites = Sites::where('user_id', '=', Auth::user()->id)->orderBy('date', 'desc')->take($sites_per_page)->get();
			foreach ($sites as $site) {
				$site->date = date("d.m.Y" , $site->date);
			}
			$data['my_sites'] = $sites;	
		}
		else {
			$data['login'] = false;
		}

		$this->layout = View::make('add')->with($data);
	}
}