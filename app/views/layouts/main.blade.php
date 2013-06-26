<!DOCTYPE html>
<html lang="ru">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="rating system by caddim">
	<title>
		@section('title') 
		Lararating 
		@show
	</title>
	
	<link rel="shortcut icon" href="favicon.png">
	<link href="css/default.css" rel="stylesheet" type="text/css">
	<link href="css/menu_assets/styles.css" rel="stylesheet" type="text/css">

	<!-- bootstrap css -->
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> 
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>
	
	<div class="container">
		<header>
			<h1>Laravel rating system</h1>

    		<div id='cssmenu'>
			<ul>			    
			   	@if ($main_menu == 'all') <li class='active'> @else <li> @endif
			    <a href='/'><span>Все</span></a></li>
			    @if ($main_menu == 'new') <li class='active'> @else <li> @endif
			    <a href='new'><span>Новые</span></a></li>
			    @if ($main_menu == 'add') <li class='active last'> @else <li class='last'> @endif
			    <a href='add'><span>Добавить</span></a></li>
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
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery-1.10.1.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>