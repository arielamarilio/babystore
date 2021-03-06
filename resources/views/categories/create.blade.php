@extends('app')

@section('content')
	<div class="container">
		<h1>Nova categoria</h1>

		@if ($errors->any())
			<ul class="alert alert-warning">
				<strong>Ooops!</strong> Erro com o preenchimento do formulário :(<br><br>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		{!! Form::open(['route'=>'categories.store', 'method' => 'post']) !!}

		<div class="form-group">
		{!! Form::label('name', 'Nome:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<!-- Descricao Form Input -->

		<div class="form-group">
		{!! Form::label('description', 'Descrição:') !!}
		{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		{!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}

	</div>
@endsection