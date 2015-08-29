@extends('app-backend')

@section('content')

<div class="row">

	<div class="panel-heading">Home</div>

	<div class="panel-body">
		<strong>Olá, {{ Auth::user()->name }}</strong><br>
		<p>Seja bem vindo :)</p><br><br>
	</div>	
</div>

@endsection