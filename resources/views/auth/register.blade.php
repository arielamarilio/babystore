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

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 social-login"></div>

            <div class="col-sm-8">
                <div class="basic-login">

                	<form class="form-horizontal" autocomplete="off" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<h3 class="heading_a uk-margin-bottom">Cadastrar</h3>

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
									<input type="text" class="md-input" name="name">
									<span class="md-input-bar"></span>
								</div>
								<div class="uk-width-medium-1-5">
									<label for="phone">Telefone</label>
									<input class="md-input masked_input" name="phone" type="text" data-inputmask="'mask': '99 - 9999-9999'" data-inputmask-showmaskonhover="false">
									<span class="md-input-bar"></span>
								</div>
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

						<div class="uk-form-row">
							<button type="submit" class="btn btn-default btn-lg btn-block">
								Cadastrar
							</button>
						</div>
						
					</form>

                </div>

            </div>
            <div class="col-sm-2 social-login"></div>
        </div>
    </div>
</div>

@endsection

@section('extra-include')
	<!-- page specific plugins -->
    <script src="/theme/altair/bower_components/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- inputmask-->
    <script src="/theme/altair/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
    <!--  forms advanced functions -->
    <script src="/theme/altair/assets/js/pages/forms_advanced.min.js"></script>
@endsection