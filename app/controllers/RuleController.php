<?php

class RuleController extends BaseController {
	// правила ресурса
	public function showRules()
	{	
		$data['main_menu'] = 'empty';
		$data['base'] = URL::to('/');

		if (Auth::check()) $data['login'] = true;
		$data['login'] = false;

		$this->layout = View::make('rules')->with($data);
	}
}