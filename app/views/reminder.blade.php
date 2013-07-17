@extends('layouts.main')

@section('title')
	@parent
	Восстановление пароля
@stop

@section('content')
	@if (Session::has('error'))
		<div class="alert alert-error">
	    	{{ trans(Session::get('reason')) }}
		</div>
	@elseif (Session::has('success'))
		<div class="alert alert-success">
	    	<p>Письмо с ссылкой на восстановление пароля отправлено на указанную почту.</p>
	    </div>
	@endif
	<form method="post">
		<label class="control-label" for="inputEmail"><strong>Электронная почта</strong></label>
		<input type="text" id="inputEmail" name="email" placeholder="Email" maxlength="50">
		<br><input type="submit" class="btn" value="Восстановить">
	</form>
@stop