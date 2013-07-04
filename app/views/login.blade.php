@extends('layouts.main')

@section('title')
	@parent
	Вход
@stop

@section('content')

	<form class="form-horizontal login-form" method="post">
		<h3>Вход на сайт</h3>
    	<div class="control-group">
	   		<label class="control-label" for="inputEmail"><strong>Почта</strong></label>
		    <div class="controls">
		    	<input type="text" id="inputEmail" name="email" placeholder="Email">
	    	</div>
    	</div>
	    <div class="control-group">
		    <label class="control-label" for="inputPassword"><strong>Пароль</strong></label>
		    <div class="controls">
		    	<input type="password" id="inputPassword" name="psw" placeholder="Password">
		    </div>
	    </div>
	    <div class="control-group">
		    <div class="controls">
		    <label class="checkbox">
		   		<input type="checkbox" name="remember"> Запомнить меня
		    </label>
	   	 	</div>
	    </div>
	    <div class="login-btns"> 
		    <button type="submit" name="enter" class="btn btn-success">Войти</button>
		    <a class="btn btn-warning" href="#">Восстановить пароль</a>
		</div>
    </form>

@stop