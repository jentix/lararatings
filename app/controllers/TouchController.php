<?php

class TouchController extends Controller {

	public function clientTouch()
	{	
		$client = new Clients;
		$client->ip = ip2long($_SERVER['REMOTE_ADDR']);
		$client->referer = $_SERVER['HTTP_REFERER'];
		if (isset($_POST['id'])) $client->site_id = $_POST['id'];
		$client->time = time();
		$client->save();
	}
}