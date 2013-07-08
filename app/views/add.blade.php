@extends('layouts.main')

@section('title')
	@parent
	Добавить сайт
@stop

@section('content')
	@if ($login)
		<div id="left-call-add">
		<form>
			<label class="control-label" for="inputName"><strong>Название</strong></label>
			<input name="name" id="inputName" type="text" class="span4" placeholder="Name" maxlength="60">
			
			<label class="control-label" for="inputLink"><strong>Ссылка на ресурс</strong></label>
			<input name="link" id="inputLink" type="text" class="span4" placeholder="Link" maxlength="80">
			
			<label class="control-label" for="inputDesc"><strong>Описание</strong></label>
			<textarea name="desc" id="inputDesc" class="span4" maxlength="140" rows="3" placeholder="Your description..."></textarea>			
			
			<br><button id="addbutton" type="submit" name="add" class="btn btn-large">Добавить</button>
		</form>

		@if (isset($messages))
			<div class="alert alert-error add-messages">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				@foreach ($messages as $message)
			    	<p>{{$message}}</p>
			    @endforeach
			</div>
		@endif

		@if (isset($success))
			<div class="alert alert-success add-messages">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{{$success}}
			</div>
		@endif
		</div>
	@else 
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