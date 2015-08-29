@extends('app')

@section('content')

<div class="row">
    <div class="md-card">
        <div class="md-card-content">

            <h3 class="heading_a">Login</h3>
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

             <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-2-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="uk-form-row">
                            <label>E-mail</label>
                            <input type="email" class="md-input" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="uk-form-row md-input-wrapper">
                            <label>Senha</label>
                            <input type="password" class="md-input" name="password">
                            <a href="" class="uk-form-password-toggle" data-uk-form-password="">Exibir</a>
                            <span class="md-input-bar"></span>
                        </div>



                        <div class="uk-form-row">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Senha</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Entrar</button>

                                <a class="btn btn-link" href="{{ url('/password/email') }}">Esqueceu sua senha?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            

            <h3 class="heading_a">Login</h3>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-form-row">
                        <label>Label</label>
                        <input type="text" class="md-input"  />
                    </div>
                    <div class="uk-form-row">
                        <label>Passsword</label>
                        <input type="password" class="md-input"  />
                    </div>
                    <div class="uk-form-row">
                        <label>Disabled</label>
                        <input type="text" class="md-input" disabled />
                    </div>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon"><input type="checkbox" data-md-icheck/></span>
                        <label>Checkbox addon</label>
                        <input type="text" class="md-input" />
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>Button addon</label>
                        <input type="text" class="md-input" />
                        <span class="uk-input-group-addon"><a class="md-btn" href="#">Save</a></span>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <label>Icon addon</label>
                        <input type="text" class="md-input" />
                        <span class="uk-input-group-addon">
                            <a href="#"><i class="material-icons">&#xE163;</i></a>
                        </span>
                    </div>
                </div>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon">$</span>
                        <label>Text addon</label>
                        <input type="text" class="md-input" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    

	

</div>

@endsection