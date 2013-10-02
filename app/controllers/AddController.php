<?php

class AddController extends BaseController {

	public function showAdd()
	{	
		
		$data = array('main_menu' => 'add');
		$data['base'] = URL::to('/');

		if (Auth::check() and (Auth::user()->mail_key == '0')) {
			$data['login'] = true;
			$data['add_form'] = true;
			
			if (Input::has('name')) {
				$input = Input::all();
				$rules = array(
					'name' => 'required|max:60|unique:sites',
					'link'   => 'required|max:100|url',
					'desc'  => 'max:140'
				);
				$validation = Validator::make($input, $rules);
				if ($validation->fails()) {
					$messages         = $validation->messages();
					$data['messages'] = $messages->all();
				}
				else {
					$newsite = new Sites;
					$newsite->user_id     = Auth::user()->id;
					$newsite->name        = Input::get('name');
					$newsite->description = Input::get('desc');
					$newsite->link        = Input::get('link');
					$newsite->date        = time();
					$newsite->save();
					$data['success'] = 'Сайт успешно добавлен';						       
				}
			}

			$sites_per_page = 10; // сайтов за раз
			$sites_count = Sites::where('user_id', '=', Auth::user()->id)->count();
			// если общее кол-во больше чем за раз, то выводим кнопку показать ещё 
			if ($sites_count > $sites_per_page) $data['get_more_site'] = $sites_per_page;

			$sites = Sites::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->take($sites_per_page)->get();
			foreach ($sites as $site) {
				$site->date = date("d.m.Y" , $site->date);
			}
			$data['my_sites'] = $sites;	

			$data['code_start'] = htmlentities('<!--frya.raiting--><script>var i=');
			$data['code_end'] = htmlentities(';s=document.createElement("script");s.type="text/javascript";s.async=true;s.src="http://rating.fryazino.net/js/lawatch.js";document.getElementsByTagName("head")[0].appendChild(s);if(s.readyState&&!s.onload){s.onreadystatechange=function(){if(s.readyState=="loaded"||s.readyState=="complete"){s.onreadystatechange=null;watcher.id=i;watcher.touch()}}}else{s.onload=function(){watcher.id=i;watcher.touch()}}</script>');
		}
		else if (Auth::check() and (Auth::user()->block == '0')) {
			$data['login'] = true;
			$data['not_email'] = true;
		}	
		else if (Auth::check() and (Auth::user()->block == '1')) {
			$data['login'] = true;
			$data['baned'] = true;
		}

		$this->layout = View::make('add')->with($data);
	}
}