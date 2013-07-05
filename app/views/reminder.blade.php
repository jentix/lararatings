@extends('layouts.main')

@section('title')
	@parent
	Восстановление пароля
@stop

@section('content')
	@if (Session::has('error'))
	    {{ trans(Session::get('reason')) }}
	@elseif (Session::has('success'))
		<div class="alert alert-success">
	    	<p>Письмо с восстановление пароля отправлено на указанную почту.</p>
	    </div>
	@endif
	<form method="post">
		<input type="text" name="email" placeholder="Email" maxlength="50">
		<br><input type="submit" class="btn" value="Восстановить">
	</form>
@stop