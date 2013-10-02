<?php

class AjaxController extends Controller {
	// все аякс запросы обрабатываются тут 
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
				// если изменяют чужой сайт выйти с ошибкой
				$sites = Sites::where('user_id', '=', Auth::user()->id)->where('id', '=', $input['id'])->first();
				if (!$sites) { $result['error'] = 'edit alien site!!!'; echo json_encode($result); exit(); }
				// если имя сайта не изменилось не проверяем на его уникальноть  
				if ($sites->name != $input['name'])	$rules = array('name' => 'required|max:60|unique:sites');
					else $rules = array('name' => 'required|max:60');
				$rules['link'] = 'required|max:100|url';
				$rules['desc'] = 'max:140';
				
				$validation = Validator::make($input, $rules);

				if ($validation->fails()) {
					$messages        = $validation->messages();
					$result['error'] = $messages->all();
				}
				else {
					$update = Sites::where('id', '=', $input['id'])->firstOrFail();
					$update->name = $input['name'];
					$update->link = $input['link'];
					$update->description = $input['desc'];
					$update->save();
					$result['good'] = 'edit complite';
				}

				echo json_encode($result);
			}
		}
	}

	public function deleteMySite() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$id = Input::get("id");
				$delete = Sites::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->first();
				
				if ($delete) { DB::table('sites')->delete($id); echo json_encode($result = array('delete' => 'complete'));}
				else echo json_encode($result = array('delete' => 'failed'));
			}
		}
	}

	public function checkMySites() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$sites = Sites::where('user_id', '=', Auth::user()->id)->get();
				foreach ($sites as $site) {
					if (($site->views_all == 0) AND ((time() - $site->date) > 108000)) {$result = "show"; break;}
				}
				if (isset($result)) echo $result;
					else echo "dont_show";
			}
		}
	}
}