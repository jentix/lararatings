<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Добро пожаловать!</title>
	</head>
	<body>
		<h2>Приветствуем вас</h2>
		<div>
			<p>Вы успешно зарегистрировались на сайте <a href="http://rating.fryazino.net">rating.fryazino.net</a></p>
			<p>Ваш логин: {{$email}}</p>
			<p>Что-бы подтвердить регистрацию перейдите по этой ссылке 
		    <a href="http://rating.fryazino.net/?key={{$hash}}">ПОДТВЕРДИТЬ</a></p>
		</div>
	</body>
</html>