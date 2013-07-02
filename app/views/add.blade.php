@extends('layouts.main')

@section('title')
	@parent
	Добавить сайт
@stop

@section('js')
	@parent
	<!-- счётчик -->
	<script>
		var p = document.getElementsByTagName("script")[0]
		s = document.createElement("script")
		s.type = "text/javascript"
    	s.async = true
    	s.src = "js/lawatch.js"
    	document.body.insertBefore(s, p)

		if (s.readyState && !s.onload) {
			s.onreadystatechange = function() {
				if (s.readyState == "loaded" || s.readyState == "complete") {
					s.onreadystatechange = null;
					watcher.id = 5;
					watcher.touch();
				}
			}
		}
		else {
			s.onload = function() {
				watcher.id = 5;
				watcher.touch();
			};
		}
	</script>
@stop