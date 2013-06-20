<html>
<head>
	<title>
		@section('title') 
			Lararating 
		@show
	</title>
	
	<link rel="shortcut icon" href="favicon.png">

	<!-- bootstrap css -->
	<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	@yield('content')

	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>