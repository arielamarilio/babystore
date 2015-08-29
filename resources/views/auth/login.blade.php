@extends('app')

@section('content')

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
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

                    <form role="form" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" name="email" value="">
                        </div>
                        <div class="form-group">  <!-- md-input-wrapper -->
                            <label>Senha</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="form-group">
                            <a href="{{ url('/password/email') }}" class="forgot-password">Esqueceu sua senha?</a>
                            <button type="submit" class="btn pull-right">Login</button>
                            <div class="clearfix"></div>
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