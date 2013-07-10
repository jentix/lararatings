<?php
	if (!mysql_connect('localhost', 'root', '')) {
		echo "Ошибка подключения к Mysql";
		exit;
	}
	mysql_select_db('lararating');
	$input = array(
		'ip' => ip2long($_SERVER['REMOTE_ADDR']),
		'referer' => $_SERVER['HTTP_REFERER'],
		'uniq_str' => md5($_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']),
		'time' => time()
	);
	if (isset($_POST['id'])) $input['site_id'] = intval($_POST['id']);
	else $input['site_id'] = 0;

	echo var_export($input);
	insertArray('clients', $input);
	// $q = mysql_query("INSERT INTO CLIENTS VALUES (".$input['site_id'].", ".$input['ip'].", ".$input['referer'].", ".$input['uniq_str'].", ".$input['time'].")");
	// echo $q;

	function insertArray($table,$data) {
		foreach ($data AS $v=>$k) {
				$k = mysql_real_escape_string($k);
				if (!isset($what))	{
					@$what	= "`$v`";
					@$value	.= ($k=='NOW()') ? "$k" : "'$k'";				
				}
				else {
					@$what	.= ",`$v`";
					@$value	.= ($k=='NOW()') ? ", $k" : ",'$k'";
				}
			}
			$sql="INSERT INTO `$table`
							  ($what)
				  VALUE	  	  ($value)
				 ";
	}
?>