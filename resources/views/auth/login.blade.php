@extends('template');
@section('main')
<h2>Login</h2>
<?php if(count($errors)) { ?>
	<div class="error">
		<ul> <?php foreach($errors->all() as $error) ?>
			<li><?php echo $error; ?></li>
		<ul>	
	</div>
<?php } ?>
<form method="post" action="" >
	<input type="hidden" name="_token" value="<?= csrf_token() ?>">
	<input type="email" name="email" required placeholder="Email" autocomplete="email" autofocus autocomplete>
	<br>	
	<input type="password" name="password" required placeholder="Password" autofocus autocomplete>
	<br>
	<input type="submit" name="Login">
</form>
@stop