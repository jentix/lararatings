<?php
	require_once 'stw_example_code.php';

	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('lararating') or die(mysql_error());

	$query = "SELECT `id`, `link` FROM sites";
	$sites = mysql_query($query);
	if (!$sites) { // ошибка
        echo "Could not successfully select sites id from DB: ".mysql_error();
        exit;
    }

    while($site = mysql_fetch_object($sites)) {
    	$thumb = preg_split('/"/', refreshThumbnail($site->link), -1);
    	$query = "UPDATE sites SET thumb = $thumb[1] WHERE id = $site->id";
    	mysql_query($query) or die(mysql_error());
    }

	mysql_close($link);
?>