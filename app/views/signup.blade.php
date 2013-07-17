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
			<br><span class="grey">мы вышлем письмо для подтверждения адреса почты</span>
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
			<input type="checkbox" name="agree">Я соглашаюсь с правилами 
		</label>
		<a id="info" class="btn btn-link reg-spl-btn">Показать правила ресурса <span class="caret"></span></a>
		<button id="regbutton" class="btn btn-large">Зарегистрироваться</button>
	</form>
	</div>
	<div class="myspoiler">
		<h4>Регистрируясь, я соглашаюсь со следующими правилами:</h4>
		<p>1. Электронная почта должна быть действующий и обязательно подтвержденной.</p>
		<p>2. Название сайта должно отражать его суть.</p>
		<p>3. Ссылка на сайт должна быть действующий.</p>
		<p>4. Запрещено использование нецензурной лексики.</p>
		<p>5. Запрещено употребление эпитетов и утверждений рекламного характера, а также прилагательных в превосходной степени в название и описание сайта.</p>
		<p>6. Запрещена накрутка счётчиков.</p>
		<p>7. Запрещено размещение одного счётчика на нескольких сайтах.</p>
		<p>8. При удаление сайта с рейтинга, без отключения сайта, желательно удалить счётчик с сайта.</p>
		<p>Отнеситесь внимательно к правилам, при нарушение их, <strong>администрация в праве заблокировать, удалить сайт или пользователя</strong>!</p>
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