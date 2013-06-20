@extends('layouts.main')

@section('title')
	@parent
	Главная
@stop

@section('content')
	<table class="table table-hover">
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
					<td> <a href="{{ $rating->link }}"> {{ $rating->name }} </a> </td>
					<td></td>
					<td> {{ $rating->date }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop