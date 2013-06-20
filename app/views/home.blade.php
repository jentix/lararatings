@extends('layouts.main')

@section('title')
	@parent
	Главная
@stop

@section('content')
	<h1>Привет</h1>
	
	@foreach ($ratings as $rating)
		<p>Имя: {{ $rating->name }} дата: {{ $rating->date }}</p>
	@endforeach
@stop