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
						<a href="{{ $rating->link }}" target="_blank"> {{ $rating->name }} </a>
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
