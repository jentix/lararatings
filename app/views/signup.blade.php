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
		
		<label class="checkbox">
			<input type="checkbox">Я соглашаюсь с правилами 
		</label>
		<a id="info" class="btn btn-link reg-spl-btn">Показать правила ресурса <span class="caret"></span></a>
		<div class="myspoiler">
			<p>Тут что-то есть...</p>
		</div>
		<button id="regbutton" class="btn btn-large">Зарегистрироваться</button>
	</form>
	</div>
	@if (isset($messages))
    	<div class="alert alert-error login-errors">
    		<button type="button" class="close" data-dismiss="alert">&times;</button>
		    @foreach ($messages as $message)
		    	<p>{{$message}}</p>
		    @endforeach
		</div>
	@endif
@stop

@section('js')
	@parent
	<!-- spoiler -->
	<script type="text/javascript">
	$("#info").click(function(){
		$('.myspoiler').slideToggle();
	});
	</script>
@stop