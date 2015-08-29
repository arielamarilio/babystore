@extends('app')

@section('content')

<!-- uikit -->
<link rel="stylesheet" href="/theme/altair/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
<!-- flag icons -->
<link rel="stylesheet" href="/theme/altair/assets/icons/flags/flags.min.css" media="all">
<!-- altair admin -->
<link rel="stylesheet" href="/theme/altair/assets/css/main.min.css" media="all">

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
</div>

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

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 social-login"></div>

            <div class="col-sm-6">
                <div class="basic-login">
                	<h3>Cadastre-se</h3>

                	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="uk-form-row">
							<div class="md-input-wrapper">
								<label>Nome</label>
								<input type="text" class="md-input" name="name">
								<span class="md-input-bar"></span>
							</div>
						</div>

						<div class="uk-form-row">
							<div class="md-input-wrapper">
								<label>E-mail</label>
								<input type="email" class="md-input" name="email">
								<span class="md-input-bar"></span>
							</div>
						</div>

						<div class="uk-form-row">
							<div class="md-input-wrapper md-input-filled">
								<label for="phone">Telefone</label>
								<input type="text" name="phone" style="display:none" value="fake input" /> 
								<input class="md-input masked_input"  name="phone" type="text" data-inputmask="'mask': '999 - 999 999 999'" data-inputmask-showmaskonhover="true">
								<span class="md-input-bar"></span>
							</div>
						</div>

						<div class="uk-form-row">
							<div class="md-input-wrapper">
								<label>Senha</label>
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

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cadastrar
								</button>
							</div>
						</div>
					</form>

                </div>

                <div class="social-login clearfix"></div>
                <div class="social-login not-member">
                    <p>Ainda não possui cadastro? <a href="{{ url('/auth/register') }}">Cadastre-se aqui</a></p>
                </div>
            </div>
            <div class="col-sm-3 social-login"></div>
        </div>
    </div>
</div>

@endsection
