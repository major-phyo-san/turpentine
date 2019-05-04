@extends('template');
@section('main')
<h2>Register</h2>
<form method="post" action="">
	<input type="hidden" name="_token" value="<?= csrf_token() ?>">
	<input type="text" name="name" required placeholder="Name" autocomplete="name"  autofocus autocomplete>
	<br>
	<input type="email" name="email" required placeholder="Email" autocomplete="email" autofocus autocomplete>
	<br>
	<input type="phone" name="phone" required placeholder="Phone Number" autofocus autocomplete>
	<br>
	<input type="password" name="password" required placeholder="Password" autofocus autocomplete>
	<br>
	<input type="password" name="password_agian" required placeholder="Re-type Password" autofocus="">
	<br>
	<input type="submit" name="Register">
</form>
@stop