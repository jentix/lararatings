@extends('layouts.main')

@section('title')
	@parent
	Добавить сайт
@stop

@section('content')
	@if ($auth_but)
		<div id="log_btns_group">
			<h4>Что-бы добавить сайт, авторизируйтесь</h4>
			<span id="log_btns">
				<a class="btn" href="login">Войти</a>
				<a class="btn" href="signup">Зарегистрироваться</a>
			</span>
		</div>
	@endif
@stop

@section('js')
	@parent	
@stop