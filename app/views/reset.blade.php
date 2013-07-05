@if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif

<form method="post">
	<input type="hidden" name="token" value="{{ $token }}">
	<input type="text" name="email">
	<br><input type="password" name="password">
	<br><input type="password" name="password_confirmation">
	<br><input type="submit" class="btn" value="Изменить пароль">
</form>
