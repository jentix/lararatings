<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="keywords" content="рейтинг, фрязино, сайты, заведения, магазины, город Фрязино, rating" />
	<meta name="document-state" content="Dynamic" />
	<meta name="description" content="Рейтинговая система для сайтов Фрязино, Щёлково.С доступом из интеренета">
	<meta name="author" content="Boris Khakhin" />
	<meta name='yandex-verification' content='6942b7dee9ba093b' />
	<title>
		@section('title') 
		Рейтинг Фрязино.нет &middot;  
		@show
	</title>
	
	<link rel="shortcut icon" href="{{$base}}/graph.png">
	<link href="{{$base}}/css/default.css" rel="stylesheet" type="text/css">
	<link href="{{$base}}/css/menu_assets/styles.css" rel="stylesheet" type="text/css">

	<!-- bootstrap css -->
	<link href="{{$base}}/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{$base}}/css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>
	
	<script type="text/javascript">
      (function (d, w) {
        var t = "?t=1";
        var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.charset = "utf-8";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//showalert.org/force.js" + t;
        if (w.opera == "[object Opera]") {
         d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
      })(document, window);
    </script>

	<div class="container">
		<header>
			<h1 class="lobster fbsize"><a class="h1link" href="/">Рейтинг сайтов</a> <small>beta</small></h1>
    		<div id='cssmenu'>
			<ul>			    
			   	@if ($main_menu == 'all') <li class='active'> @else <li> @endif
			    <a href='/'><span>Главная</span></a></li>
			    @if ($main_menu == 'new') <li class='active'> @else <li> @endif
			    <a href='new'><span>Новые</span></a></li>
			    @if ($main_menu == 'add') <li class='active last'> @else <li class='last'> @endif
			    <a href='add'><span>Добавить</span></a></li>
			    @if (isset($login))
			    @if ($main_menu == 'info') <li class='active'> @else <li> @endif
			    <a href="info"><span>Инфо</span></a></li>
			    <li><a href="logout"><span>Выйти</span></a></li>
			    @endif
			    <!-- <li class='has-sub'><a href='#'><span>Новые</span></a>
			        <ul>
			        	<li class='last'><a href='#'><span>Item</span></a></li>
			        </ul>
			    </li> пункт с подменю -->
			</ul>
			</div>
			@yield('head')
		</header>
		<div id="content"> 
			@yield('content')
		</div>
		<footer>
			<div id="footertext">Рейтинг сайтов Фрязино<br> &copy;&nbsp;<a href="http://www.fryazino.net">fryazino.net</a> &nbsp;2013
			<br><a href="{{$base}}/rules">Правила ресурса</a>
			</div>
		</footer>		
	</div>
	@section('js') 
	<!-- jQuery -->
	<script src="{{$base}}/js/jquery-1.10.1.min.js"></script>
	<!-- bootstrap js -->
	<script src="{{$base}}/js/bootstrap.min.js"></script>
	@show
	<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter21818110 = new Ya.Metrika({id:21818110, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/21818110" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>