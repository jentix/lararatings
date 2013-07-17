<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Восстановление пароля</title>
	</head>
	<body>
		<h2>Восстановление пароля</h2>

		<div>
			Что-бы восстановить пароль, заполните форму, перейдя по этой ссылке:<br> {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>