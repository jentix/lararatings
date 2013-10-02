@extends('layouts.main')

@section('title')
	@parent
	Главная
@stop

@section('content')
	<div id="definition">{{ $i = 1 }}</div>
	<!-- вывод сообщения о подтверждение почты -->
	@if (isset($email_check))
		<div class="alert">
			{{$email_check}}
		</div>
	@endif
	<div id="message_for_non_look"></div>
	<table class="table main-table">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>Сайт</th>
				<th>Просмотров в день</th>
				<th>Просмотров всего</th>
				<th>Просмотров вчера</th>
				<th>Добавлен</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ratings as $rating)
				<tr>
					<td> {{ $i; $i++; }} </td>
					<td><img src="http://www.google.com/s2/favicons?domain={{ $rating->link }}"></td>
					<td> 
						<a href="{{ $rating->link }}" class="mytooltip" target="_blank"> {{ $rating->name }} @if ($rating->thumb != "")<span><img src="http://rating.fryazino.net/thumbs/{{$rating->thumb}}"></span> @endif </a>

						@if ($rating->description)
							<p class="grey">{{ $rating->description }}</p> 
						@endif 
					</td>
					<td>{{$rating->views_mean}}</td>
					<td>{{$rating->views_all}}</td>
					<td>{{$rating->views_day}}</td>
					<td> {{ $rating->date }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$ratings->links();}}
@stop

@section('js')
	@parent
	<script src="{{$base}}/js/jquery.cookie.js"></script>
	<script type="text/javascript">
		if (!$.cookie('no_show')) {
			$.post('/ajax/checkMySites',
				function(result) {
					if (result == 'show') {
						$("#message_for_non_look").html('<div class="alert alert-error"><button type="button" class="close dont_show" data-dismiss="alert">&times;</button><strong>Внимание!</strong> У вашего сайта нет ни одного посещения, возможно вы не добавили счетчик. Пожалуйста проверьте это!<br>Сайты без посещений автоматически удалятся через месяц.</div>');
					}
					else $.cookie('no_show', 'yes', { expires: 2 });
				}
			);
		}
		
		$(document).on("click", ".dont_show", function() {
			$.cookie('no_show', 'yes', { expires: 1 });
		});
	</script>
@stop