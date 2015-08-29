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
            <div class="col-md-12"></div>
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

                    <form role="form" role="form" method="POST" action="{{ url('/auth/login') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="uk-form-row">
                            <div class="md-input-wrapper">
                                <label>E-mail</label>
                                <input type="email" class="md-input" name="email" value="" autocomplete="off">
                                <span class="md-input-bar"></span>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="md-input-wrapper">
                                <label>Senha</label>
                                <input type="password" class="md-input" name="password" autocomplete="off">
                                <span class="md-input-bar"></span>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <a href="{{ url('/password/email') }}" class="forgot-password">Esqueceu sua senha?</a>
                        </div>

                        <div class="uk-form-row">
                            <button type="submit" class="btn btn-default btn-lg btn-block">
                                Login
                            </button>
                        </div>

                    </form>


                </div>

                <div class="social-login clearfix"></div>
                <div class="social-login not-member">
                    <p>É novo por aqui? <a href="{{ url('/auth/register') }}">Cadastre-se agora!</a></p>
                </div>
            </div>
            <div class="col-sm-3 social-login"></div>
        </div>
    </div>
</div>

<!-- inputmask-->
<script src="/theme/altair/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
<!--  forms advanced functions -->
<script src="/theme/altair/assets/js/pages/forms_advanced.min.js"></script>

@endsection