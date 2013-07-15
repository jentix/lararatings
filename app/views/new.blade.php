@extends('layouts.main')

@section('title')
	@parent
	Новые сайты
@stop

@section('content')
	<div id="definition">{{ $i = 1 }}</div>
	<table class="table main-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Сайт</th>
				<th>Просмотров в день</th>
				<th>Просмотров вчера</th>
				<th>Просмотров всего</th>
				<th>Добавлен</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ratings as $rating)
				<tr>
					<td> {{ $i; $i++; }} </td>
					<td> 
						<a href="{{ $rating->link }}"> {{ $rating->name }} </a>
						@if ($rating->description)
							<p class="grey">{{ $rating->description }}</p> 
						@endif 
					</td>
					<td>{{$rating->views_mean}}</td>
					<td>{{$rating->views_day}}</td>
					<td>{{$rating->views_all}}</td>
					<td> {{ $rating->date }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{$ratings->links();}}
@stop

@section('js')
@parent
<!-- счётчик -->
<script>
	var p = document.getElementsByTagName("script")[0]
	var i = 1;
	s = document.createElement("script")
	s.type = "text/javascript"
	s.async = true
	s.src = "js/lawatch.js"
	document.body.insertBefore(s, p)

	if (s.readyState && !s.onload) {
		s.onreadystatechange = function() {
			if (s.readyState == "loaded" || s.readyState == "complete") {
				s.onreadystatechange = null;
				watcher.id = i;
				watcher.touch();
			}
		}
	}
	else {
		s.onload = function() {
			watcher.id = i;
			watcher.touch();
		};
	}
</script>
@stop