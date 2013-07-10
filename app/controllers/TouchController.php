<?php

class TouchController extends Controller {

	public function clientTouch()
	{	
		$client           = new Clients;
		$client->ip       = ip2long($_SERVER['REMOTE_ADDR']);
		$client->referer  = $_SERVER['HTTP_REFERER'];
		$client->uniq_str = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		$client->time     = time();
		if (isset($_POST['id'])) $client->site_id = intval($_POST['id']);
		$client->save();
	}
}