@extends('layouts.main')

@section('title')
	@parent
	Добавить сайт
@stop

@section('content')
	@if (isset($login) and isset($add_form))
		<!-- текст счетчиков для js -->
		<div id="definition"><div id="codefp">{{$code_start}}</div><div id="codesp">{{$code_end}}</div></div>
		<div id="left-call-add">
		<h4 class="add-sites-title">Добавить сайт</h4>
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
			<h4 class="my_sites_title">Мои сайты</h4>
			<table class="table main-table">
			<thead>
			<tr>
				<th>Сайт</th>
				<th>Просмотров в день</th>
				<th>Добавлен</th>
				<th>Настройки</th>
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
				<td>{{ $site->views_mean }}</td>
				<td> {{ $site->date }} </td>
				<td class="show-code" title="Показать код счётчика"><i class="icon-chevron-down" id="{{$site->id}}"></i></td>
			</tr>
			<tr class="table-code id{{$site->id}}">
				<td colspan="4">
					<pre>{{$code_start}}{{$site->id}}{{$code_end}}</pre>
					разместите код счетчика на все страницы своего сайта между тегами &lt; body &gt; &lt; &frasl; body &gt;
					<span class="label hover pull-right"><i class="icon-remove" title="удалить"></i></span>
					<span class="label hover pull-right edits" name="{{$site->name}}"><i class="icon-pencil" title="изменить"></i></span>
				</td>
			</tr>
			@endforeach
			</tbody>
			</table>
			@if (isset($get_more_site))
				<button id="get_m_sites" class="btn" data-loading-text="Loading..." count="{{$get_more_site}}" current="{{$get_more_site}}">Ещё сайты..</button>
			@endif
		</div>
		
		<!-- edit modal -->
		<div id="modaledit" class="modal hide fade">
		    <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			    <h4>Изменение данных сайта <br><span id="site_name"></span></h4>
		    </div>
		    <div class="modal-body">
		    	<form>
		    		<label class="control-label" for="inputName"><strong>Название</strong></label>
					<input name="name" id="editName" type="text" class="span4" placeholder="Name" maxlength="60">
					
					<label class="control-label" for="inputLink"><strong>Ссылка на ресурс</strong></label>
					<input name="link" id="editLink" type="text" class="span4" placeholder="Link" maxlength="80">
					
					<label class="control-label" for="inputDesc"><strong>Описание</strong></label>
					<textarea name="desc" id="editDesc" class="span4" maxlength="140" rows="3" placeholder="Your description..."></textarea>	
		    	</form>
		    	<div id="edit_m_message"></div>
		    </div>
		    <div class="modal-footer">
			    <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
			    <button class="btn btn-primary save_data">Сохранить</button>
		    </div>
	    </div>
	    <!-- edit modal -->

	<!-- если почта не подтверждена -->
	@elseif (isset($not_email)) 
		<div id="log_btns_group">
			<h4>Что-бы добавить сайт, подтвердите почту.</h4>
			<p>Вам на почту было выслано письмо с ссылкой на подтверждение!</p>
			<p>Если письмо не пришло, нажмите на кнопку ниже, что-бы отправить новое.</p>
			<button class="btn" id="sendmailcheck">Отправить письмо</button>
			<div class="alert alert-success hiden" id="mailsendcomplite">
				Вам отправлено новое сообщение.
			</div>
		</div> 
	<!-- если забанен -->
	@elseif (isset($baned))
		<div id="log_btns_group">
			<h4>Вы забанены администрацией сайта.</h4>
			<p>С вопросами обращайтесь на почту <a href="mailto:office@fryazino.net">office@fryazino.net</a></p>
		</div>
	@else 
		<div id="log_btns_group">
			<h4>Что-бы добавить сайт, авторизуйтесь.</h4>
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
                        	var number = 0; // кол-во записей в бд                          
                        	$.each(result,function(i,item){
                        		$("#sitestbl").append("<tr>"+"<td>"+'<a href="'+item.link+'">'+item.name+"</a>"+'<p class="grey">'+item.description+"</p>"+"</td>"+"<td>"+item.views_mean+"</td>"+"<td>"+item.date+"</td>"+'<td class="show-code" title="Показать код счётчика"><i class="icon-chevron-down" id="'+item.id+'"></i></td>'+"</tr>");
                            	$("#sitestbl").append('<tr class="table-code id'+item.id+'"><td colspan="4"><pre>'+$("#codefp").html()+item.id+$("#codesp").html()+'</pre>разместите код счетчика на все страницы своего сайта между тегами &lt; body &gt; &lt; &frasl; body &gt;<span class="label hover pull-right"><i class="icon-remove" title="удалить"></i></span><span class="label hover pull-right edits" name="'+item.name+'"><i class="icon-pencil" title="изменить"></i></span>&nbsp;</td></tr>');
                            	number = item.c;
                            	sitenum++;                     
                            });
                            if (sitenum < count)  $("#get_m_sites").hide(); // прячем саму кнопку                                         
                        	$("#get_m_sites").attr('current', current*1+sitenum);
                        	if (number == current*1+sitenum) $("#get_m_sites").hide();
                        }
                        else $("#get_m_sites").hide();              
                    }, 'json'
            );
		});

		$(document).on("click", ".show-code", function(){ 
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

		$(document).on("click", ".edits", function() {
			var name = $(this).attr("name");
			$('#modaledit #site_name').html(name);
			$("#editName").val();
			$("#editLink").val();
			$("#editDesc").val();
			$('#modaledit').modal();
		});

		$(document).on("click", ".save_data", function(){
			var site = $("#modaledit #site_name").html();
			var name = $("#editName").val();
			var link = $("#editLink").val();
			var desc = $("#editDesc").val();
			// alert(site+"_"+name+"_"+link+"_"+desc);
			$.post('/ajax/editMySite',
					{'site':site, 'name':name, 'link':link, 'desc':desc},
					function(result) {
						if (result.error) $("#edit_m_message").html('<div class="alert alert-error">'+result.error+'</div>');
						if (result.good) {$('#modaledit').modal('hide');}
					}, 'json'
			);
		});
	</script>
	@if (isset($not_email))
	<script>
		$("#sendmailcheck").click(function(){
			$.post('/ajax/sendNewMailAuth',
					{'sendme':'newauthmail'},
					function(result) {
						if (result == 'nice') {
							$("#mailsendcomplite").show();
						}
					}
			);
		});
	</script>
	@endif 
@stop