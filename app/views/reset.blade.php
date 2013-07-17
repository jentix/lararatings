@extends('layouts.main')

@section('title')
	@parent
	Смена пароля
@stop

@section('content')

@if (Session::has('error'))
	<div class="alert alert-error">
    	{{ trans(Session::get('reason')) }}
	</div>
@endif

<form method="post">
	<input type="hidden" name="token" value="{{ $token }}">
	<input type="text" name="email" placeholder="Email">
	<br><input type="password" name="password" placeholder="пароль">
	<br><input type="password" name="password_confirmation" placeholder="подтверждение пароля">
	<br><input type="submit" class="btn" value="Изменить пароль">
</form>

@stop