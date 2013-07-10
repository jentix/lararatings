@extends('layouts.main')

@section('title')
	@parent
	Добавить сайт
@stop

@section('content')
	@if (isset($login))
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
		<div id="right-call-add">
			<h4 class="add_site_title">Мои сайты</h4>
			<table class="table main-table">
			<thead>
			<tr>
				<th>Сайт</th>
				<th>Просмотров</th>
				<th>Добавлен</th>
			</tr>
			</thead>
			<tbody id="sitestbl">
			@foreach ($my_sites as $site)
			<tr>
				<td> 
					<a href="{{ $site->link }}"> {{ $site->name }} </a>
					@if ($site->description)
						<p class="grey">{{ $site->description }}</p> 
					@endif 
				</td>
				<td></td>
				<td> {{ $site->date }} </td>
				<td class="show-code"><i class="icon-chevron-down" id="{{$site->id}}"></i></td>
			</tr>
			<tr class="table-code id{{$site->id}}"><td colspan="4"><pre>{{$code_start}}{{$site->id}}{{$code_end}}</pre></td></tr>
			@endforeach
			</tbody>
			</table>
			@if (isset($get_more_site))
				<button id="get_m_sites" class="btn" data-loading-text="Loading..." count="{{$get_more_site}}" current="{{$get_more_site}}">Ещё сайты..</button>
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
	<!-- подгрузка дополнительных сайтов -->
	<script>
		$("#get_m_sites").click(function(){
			var count = $(this).attr('count'); // сайтов за раз
			var current = $(this).attr('current'); // текущая позиция 
			$.post('/ajax/getMySites',
                    {'count':count, 'current':current},
                    function(result) {
                        if (result != 0) {  
                        	var sitenum = 0;                          
                        	$.each(result,function(i,item){
                        		$("#sitestbl").append("<tr>"+"<td>"+'<a href="'+item.link+'">'+item.name+"</a>"+'<p class="grey">'+item.description+"</p>"+"</td>"+"<td></td>"+"<td>"+item.date+"</td>"+"</tr>");
                            	sitenum++;
                            });
                            if (sitenum<count)  $("#get_m_sites").hide(); // прячем саму кнопку                            
                        	$("#get_m_sites").attr('current', current*1+sitenum);
                        }
                    }, 'json'
            );
		});

		$(".show-code").click(function(){
			var id = $(this).children().attr("id");
			var str = ".id"+id;
			if ($(this).children().hasClass("icon-chevron-down")) {
				$(this).children().removeClass("icon-chevron-down");
				$(this).children().addClass("icon-chevron-up");
			}
			else {
				$(this).children().removeClass("icon-chevron-up");
				$(this).children().addClass("icon-chevron-down");
			}
			$(str).toggle();
		});
	</script>
@stop