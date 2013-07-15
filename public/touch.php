<?php
	header("Pragma: no-cache");
	header("Cache-Control: private, no-cache, no-store, must-revalidate, max-age=0");
	
	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('lararating') or die(mysql_error());
	
	$ip = ip2long($_SERVER['REMOTE_ADDR']);
	$referer = $_SERVER['HTTP_REFERER'];
	$uniq_str = md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
	$site_id = intval($_POST['id']);
	$time = time();
	
	$query = "INSERT INTO clients VALUES('$site_id','$ip','$referer','$uniq_str','$time')";
	mysql_query($query) or die(mysql_error());
	mysql_close($link);
?>