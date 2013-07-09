<?php

class AjaxController extends Controller {
	
	public function getMySites() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$sites = Sites::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->take( Input::get('count'))->skip(Input::get('current'))->get();
				foreach ($sites as $site) {
					$site->date = date("d.m.Y" , $site->date);
				}
				echo $sites;
			}				
		}
	}
}