<?php
	set_time_limit (0);
	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('db_rating') or die(mysql_error());

	$query = "CREATE TABLE IF NOT EXISTS `newclients` (
				`site_id` int(10) unsigned NOT NULL,
				`ip` int(10) NOT NULL,
				`referer` varchar(200) DEFAULT NULL,
				`uniq_str` varchar(32) NOT NULL,
				`time` int(10) NOT NULL,
				KEY `site_id` (`site_id`),
				KEY `uniq_str` (`uniq_str`)
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
	mysql_query($query) or die(mysql_error());

	$query = "RENAME TABLE clients TO stats,
						   newclients TO clients";
	mysql_query($query) or die(mysql_error());					   
?>