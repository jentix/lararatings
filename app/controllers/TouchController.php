<?php

class TouchController extends BaseController {

	public function clientTouch()
	{	
		$client = new Clients;
		$client->ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_POST['id'])) $client->site_id = $_POST['id'];
		$client->time = time();
		$client->save();
	}
}