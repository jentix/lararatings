<?php
	// удаление сайтов у которых нет просмотров вообще в течение месяца
	set_time_limit (0);
	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('lararating') or die(mysql_error());

	$subject = "Рейтинг Fryazino.net удаление сайта";
    $headers  = "From: office@fryazino.net \r\n";
    $headers .= 'Content-Type: text/plain; charset="utf-8" \r\n';

	$query = "SELECT `id`, `user_id`, `name`, `date`, `views_all` FROM sites";
	$sites = mysql_query($query);
	$time_now = time();

	while($site = mysql_fetch_object($sites)) {
		if ((($time_now - $site->date) > 2678400) AND ($site->views_all == 0)) {
			$query = "DELETE FROM sites WHERE id = $site->id";
			mysql_query($query) or die(mysql_error());

			$query = "SELECT `email` FROM users WHERE id = $site->user_id";
			$user = mysql_query($query) or die(mysql_error());
			$user = mysql_fetch_object($user);

			global $subject, $headers;
			$message = "Ваш сайт $site->name удален с рейтинга т.к. за месяц с момента его регистрации не было ни одного просмотра \n".
		    "Возможно ваш сайт не доступен или вы не установили счетчик на свой сайт! \n\n".
		    "Данная мера оговорена в правилах ресурса \n";

			$send = mail($user->email, $subject, $message, $headers);
			echo "site delete: $site->name  mail send to: $user->email $send <br>";
		}
	}

	mysql_close($link);
?>
