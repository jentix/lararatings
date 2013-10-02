<?php

class BaseController extends Controller {

	/**
	 * стандартный контролер в нем подружается layout для всех его наследующих.
	 *
	 * @return void
	 */
	protected $layout = 'layouts.main';
	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}