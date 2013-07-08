<?php

class AjaxController extends Controller {
	public function getMySites() {
		if (Request::ajax()) {
			if (Auth::check()) {
				
			}				
		}
	}
}