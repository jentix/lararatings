<?php

class TouchController extends Controller {
	// не используется, используется touch.php в папке public
	public function clientTouch()
	{	
		$client           = new Clients;
		$client->ip       = ip2long($_SERVER['REMOTE_ADDR']);
		$client->referer  = $_SERVER['HTTP_REFERER'];
		$client->uniq_str = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
		$client->time     = time();
		$client->site_id = intval($_POST['id']);
		$client->save();
	}
}