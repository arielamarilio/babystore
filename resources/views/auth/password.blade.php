@extends('app')

@section('content')
<div class="row">

	<strong>Redefinição de senha</strong><br>
	<em>Entre com seu e-mail para enviar o link de redefinição de senha</em><br><br>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Ooops!</strong> Erro com o preenchimento do formulário :(<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label class="col-md-4 control-label">E-mail</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Enviar link para redefinição de senha
				</button>
			</div>
		</div>
	</form>
</div>
@endsection
