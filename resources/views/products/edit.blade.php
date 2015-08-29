@extends('app')

@section('content')
	<div class="container">
		<h1>Editar categoria: {{$brands->name}}</h1>
		
		@if ($errors->any())
		<ul class="alert alert-warning">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		{!! Form::open(array('route' => ['brands.update', $brands->id], 'method' => 'put', 'files'=>true)) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', $brands->name, ['class'=>'form-control']) !!}
		</div>

		<img src="{!! $brands->image !!}" alt="..." class="img-thumbnail">

		<div class="form-group">
			{!! Form::label('image', 'Logotipo:') !!}
			{!! Form::file('image') !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', $brands->description, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
	</div>
@endsection