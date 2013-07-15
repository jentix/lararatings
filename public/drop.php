<?php
	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('db_rating') or die(mysql_error());

	$query = "DROP TABLE IF EXISTS stats";
	mysql_query($query) or die(mysql_error());

	mysql_close($link);
?>