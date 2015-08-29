@extends('app-backend')

@section('content')

<div class="row">
	<div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <i class="glyphicon glyphicon-cog pull-right"></i>
                <h4>Meus dados</h4>
                <small>Dados cadastrais da sua conta</small>
            </div>
        </div>
        <div class="panel-body">

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

				

			{!! Form::open(array('route' => ['users.internal_update'], 'method' => 'post', 'class' => 'form-horizontal')) !!}

				<div class="form-group">
					<label class="col-md-4 control-label">Nome</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">E-mail</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Telefone</label>
					<div class="col-xs-2">
						<input type="text" class="form-control" name="phone" id="phone"  value="{{ Auth::user()->phone }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Senha</label>
					<div class="col-xs-4">
						<input type="password" class="form-control" name="password">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Confirmar senha</label>
					<div class="col-xs-4">
						<input type="password" class="form-control" name="password_confirmation">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Alterar dados
						</button>
					</div>
				</div>
			
			{!! Form::close() !!}
        </div>
        <!--/panel content-->
    </div>

	<script type="text/javascript">
	$( document ).ready(function( $ ) {
		$(".phone").mask("(99) 9999-9999");
	});
	</script>
</div>
@endsection
