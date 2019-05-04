@extends('template');
@section('main')
<h2>Login</h2>
<form method="post" action="" >
	<input type="hidden" name="_token" value="<?= csrf_token() ?>">
	<input type="email" name="email" required placeholder="Email" autocomplete="email" autofocus autocomplete>
	<br>	
	<input type="password" name="password" required placeholder="Password" autofocus autocomplete>
	<br>
	<input type="submit" name="Login">
</form>
@stop