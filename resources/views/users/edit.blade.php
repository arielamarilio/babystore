@extends('app-backend')

@section('content')

<div class="basic-login">

	{!! Form::open(array('route' => ['users.internal_update'], 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<h3 class="heading_a uk-margin-bottom">Meus dados</h3>

		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <strong>Ooops!</strong> Erro com o preenchimento do formulário :(<br>
	            @foreach ($errors->all() as $error)
	            - {{ $error }} <br>
	            @endforeach
		    </div>
		@endif

		<div class="uk-form-row">
			<div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-4-5">
					<label>Nome</label>
					<input type="text" class="md-input" name="name" value="{{ Auth::user()->name }}">
					<span class="md-input-bar"></span>
				</div>	
				<div class="uk-width-medium-1-5">
					<label for="phone">Telefone</label>
					<input class="md-input masked_input" name="phone" type="text" data-inputmask="'mask': '99 - 9999-9999'" data-inputmask-showmaskonhover="false" value="{{ Auth::user()->phone }}">
					<span class="md-input-bar"></span>
				</div>
            </div>	
        </div>	

		<div class="uk-form-row">
			<div class="md-input-wrapper md-input-filled">
				<label>E-mail</label>
				<input type="email" class="md-input" name="email" value="{{ Auth::user()->email }}">
				<span class="md-input-bar"></span>
			</div>
		</div>
		<div class="uk-form-row">
			<div class="md-input-wrapper">
				<label>Alterar senha</label>
				<input type="password" class="md-input" name="password">
				<span class="md-input-bar"></span>
			</div>
		</div>
		<div class="uk-form-row">
			<div class="md-input-wrapper">
				<label>Confirmar senha</label>
				<input type="password" class="md-input" name="password_confirmation">
				<span class="md-input-bar"></span>
			</div>
		</div>

		<div class="uk-form-row">
			<button type="submit" class="btn btn-default btn-lg btn-block">
				Alterar dados
			</button>
		</div>
		
	{!! Form::close() !!}

</div>

@endsection
