<?php
	set_time_limit (0);
	$link = mysql_connect('localhost', 'root', '') or die("Could not connect: " . mysql_error());
	mysql_select_db('db_rating') or die(mysql_error());

	// выбираем id сайтов и их общее число просмотров и визитов из базы сайтов
	$query = "SELECT `id`, `name`, `date`, `views_all` FROM sites";
	$sites = mysql_query($query);

	if (!$sites) { // ошибка
        echo "Could not successfully select sites id from DB: ".mysql_error();
        exit;
    }

    while($site = mysql_fetch_object($sites)) {
    	echo $site->id." : ".$site->name."; old_views_all: ".$site->views_all."<br>";
    	
    	$views = 0;  // инстализируем текущие показатели
    	// в цикле получаем статистику по каждому сайту  
    	$query = "SELECT * FROM stats WHERE site_id = $site->id";
    	$stats = mysql_query($query);

    	if (mysql_num_rows($stats) != 0) { // если есть статистика
    		echo "count ".mysql_num_rows($stats);

    		$previous = 0; // предыдущая запись статистики	
    		while($stat = mysql_fetch_object($stats)) {
    			if ($previous) {
    				// если это разные клиенты увел. счетчик просмотров
    				if ($stat->uniq_str != $previous->uniq_str) $views++; 
    				// если запрос с разных страниц сайта то увеличиваем
    				else if ($stat->referer != $previous->referer) $views++;
    					 // если с одной но через промежуток времени 5сек
    					 else if (($stat->time - $previous->time) > 5) $views++;
    			}
    			$previous = $stat; // присвоить текущую запись предыдущей
    		}
    		mysql_free_result($stats);

    		$all_time = time() - $site->date; 
			$days = round($all_time/86400, 2); // дней с регистрации сайта						
    		$all_views = $site->views_all + $views; // новое общее число просмотров
    		$mean_views = round($all_views/$days); // среднее число просмотров в день
    		// обновляем данные о сайте
    		$query = "UPDATE sites SET views_day = $views, views_all = $all_views, views_mean = $mean_views WHERE id = $site->id";	
    		mysql_query($query) or die(mysql_error());

    		echo "<br> views_now = ".$views." views_all = ".$all_views." all_days = ".$days."<br>";
    	}
    }

	mysql_close($link);
?>