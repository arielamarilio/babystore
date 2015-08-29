@extends('app')

@section('content')
	<div class="container">
		<h1>Editar categoria: {{$categories->name}}</h1>
		
		@if ($errors->any())
		<ul class="alert alert-warning">
			<strong>Ooops!</strong> Erro com o preenchimento do formulário :(<br><br>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		@endif

		{!! Form::open(array('route' => ['categories.update', $categories->id], 'method' => 'put')) !!}

		<!-- Nome Form Input -->
		<div class="form-group">
			{!! Form::label('name', 'Nome:') !!}
			{!! Form::text('name', $categories->name, ['class'=>'form-control']) !!}
		</div>
		<!-- Descricao Form Input -->
		<div class="form-group">
			{!! Form::label('description', 'Descrição:') !!}
			{!! Form::textarea('description', $categories->description, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
	</div>
@endsection