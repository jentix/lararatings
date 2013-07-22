<?php

class AjaxController extends Controller {
	
	public function getMySites() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$sites = Sites::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->take(Input::get('count'))->skip(Input::get('current'))->get();				
			    $count = DB::table('sites')->count();
			    foreach ($sites as $site) {
					$site->date = date("d.m.Y" , $site->date);
					$site->c = $count;
				}
				echo $sites;
			}				
		}
	}
	public function sendNewMailAuth() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$maildata = array('email' => Auth::user()->email, 'hash' => Auth::user()->mail_key);
			
				Mail::send('emails.welcome', $maildata, function($message)use($maildata)
				{	
				    $message->to($maildata['email'])->subject('Добро пожаловать!');
				});
				echo 'nice';
			}
		}
	}
	public function editMySite() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$input = Input::all();
				$rules = array(
					'name' => 'max:60|unique:sites',
					'link'   => 'max:100|url',
					'desc'  => 'max:140'
				);
				$validation = Validator::make($input, $rules);

				if ($validation->fails()) {
					$messages        = $validation->messages();
					$result['error'] = $messages->all();
				}
				else {
					$update = Sites::where('name', '=', Input::get('site'))->firstOrFail();
					if (Input::get('name') != '') $update->name = Input::get('name');
					if (Input::get('link') != '') $update->link = Input::get('link');
					if (Input::get('desc') != '') $update->description = Input::get('desc');
					$update->save();
					$result['good'] = 'edit complite';
				}

				echo json_encode($result);
			}
		}
	}
}