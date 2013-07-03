@extends('layouts.main')

@section('title')
	@parent
	Вход
@stop

@section('content')
	<form class="form-horizontal login-form">
		<h3>Вход на сайт</h3>
    	<div class="control-group">
	   		<label class="control-label" for="inputEmail"><strong>Почта</strong></label>
		    <div class="controls">
		    	<input type="text" id="inputEmail" placeholder="Email">
	    	</div>
    	</div>
	    <div class="control-group">
		    <label class="control-label" for="inputPassword"><strong>Пароль</strong></label>
		    <div class="controls">
		    	<input type="password" id="inputPassword" placeholder="Password">
		    </div>
	    </div>
	    <div class="control-group">
		    <div class="controls">
		    <label class="checkbox">
		   		<input type="checkbox"> Запомнить меня
		    </label>
	   	 	</div>
	    </div>
	    <div class="login-btns"> 
		    <button type="submit" class="btn btn-success">Войти</button>
		    <a class="btn btn-warning" href="#">Восстановить пароль</a>
		</div>
    </form>
@stop