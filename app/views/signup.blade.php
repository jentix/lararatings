@extends('layouts.main')

@section('title')
	@parent
	Регистрация
@stop

@section('content')
	<div id="reg-form">
	<form method="post">
		<h4>Заполните все поля <br><small>пароль от 5 до 40 символов</small></h4>
		<div id="group_email" class="control-group">
			<label class="control-label" for="inputEmail"><strong>Электронная почта</strong></label>
			<input name="email" id="inputEmail" type="text" class="span3" placeholder="Email" maxlength="50">
		</div>

		<div id="group_psw" class="control-group">
			<label class="control-label" for="inputPass"><strong>Пароль</strong></label>
			<input name="psw" id="inputPass" type="password" class="span3" placeholder="password" maxlength="40">
		</div>

		<div id="group_2psw" class="control-group">
			<label class="control-label" for="input2Pass"><strong>Повторите пароль</strong></label>
			<input name="2psw" id="input2Pass" type="password" class="span3" placeholder="password" maxlength="40">
		</div>
		<button id="regbutton" class="btn btn-large">Зарегистрироваться</button>
	</form>
	</div>
@stop