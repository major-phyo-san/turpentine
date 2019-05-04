@extends('template');
@section('main');
<h2>Home Page</h2>
<div>
	Hall User: <a href=" <?= URL::to('login/hall-user') ?> ">Login |</a> <a href="<?= URL::to('/register/hall-user') ?>"> Register</a>
</div>
<div>
	Hall Owner: <a href=" <?= URL::to('login/hall-owner')?> "> Login |</a> <a href="<?= URL::to('/register/hall-owner') ?>"> Register</a>
</div>

@stop