@extends('layouts.main')

@section('title')
	@parent
	Главная
@stop

@section('content')
	<table class="table table-hover table-striped main-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Сайт</th>
				<th>Просмотров</th>
				<th>Добавлен</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ratings as $rating)
				<tr>
					<td> {{ $rating->id }} </td>
					<td> 
						<a href="{{ $rating->link }}"> {{ $rating->name }} </a>
						@if ($rating->description)
							<p class="grey">{{ $rating->description }}</p> 
						@endif 
					</td>
					<td></td>
					<td> {{ $rating->date }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop