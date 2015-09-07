<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Pequeno bazar - o bazar do seu pequenino na web!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/theme/front-end/css/bootstrap.min.css">
        <link rel="stylesheet" href="/theme/front-end/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="/theme/front-end/css/leaflet.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/leaflet.ie.css" />
        <![endif]-->
        <link rel="stylesheet" href="/theme/front-end/css/main.css">

        <script src="/theme/front-end/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- uikit -->
        <link rel="stylesheet" href="/theme/altair/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
        <!-- flag icons -->
        <link rel="stylesheet" href="/theme/altair/assets/icons/flags/flags.min.css" media="all">
        <!-- altair admin -->
        <link rel="stylesheet" href="/theme/altair/assets/css/main.min.css" media="all">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/theme/front-end/css/social.css" />

        <link rel="stylesheet" href="/theme/front-end/css/findcon-navbar.css" />
        <link rel="stylesheet" href="/theme/front-end/css/btn-circle.css" />
        <link rel="stylesheet" href="/theme/front-end/css/user-bar.css" />

        <!-- Javascripts -->
        <script src="/theme/front-end/js/jquery-1.9.1.min.js"></script>
        <script src="/theme/front-end/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="/theme/front-end/js/jquery.fitvids.js"></script>
        <script src="/theme/front-end/js/jquery.sequence-min.js"></script>
        <script src="/theme/front-end/js/jquery.bxslider.js"></script>
        <script src="/theme/front-end/js/main-menu.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <nav class="navbar navbar-findcond navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Pequeno bazar</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">

                        @if (Auth::guest())
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                            <li><a href="{{ url('/auth/register') }}">Faça seu cadastro</a></li>
                        @else
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i> 
                                    {{ Auth::user()->name }} 
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('users.edit') }}">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            Meus dados
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/auth/logout') }}">
                                            <i class="glyphicon glyphicon-log-out"></i>
                                            Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 28px"></div>
            </div>
        </div> 

        <div class="section">
            <div class="container">
                <div class="row basic-panel profile-panel">
                    <div class="col-sm-2" style="text-align: right;">
                        <img data-src="holder.js/140x140" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNGY5ZWIxNWIyYSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE0ZjllYjE1YjJhIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA3ODEyNSIgeT0iNzQuNjczNDM3NSI+MTQweDE0MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="width: 140px; height: 140px;">
                    </div>

                    <div class="col-sm-4">
                        <address>
                            <br>
                            <h3>{{ Auth::user()->name }} </h3>
                            Link: <a href="http://www.site.com">www.site.com</a> <br>
                        </address>
                    </div>

                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ route('products') }}" class="btn btn-sq btn-info"><i class="fa fa-tags fa-5x"></i><br/>Produtos</a>
                        <a href="#" class="btn btn-sq btn-info"><i class="fa fa-comments fa-5x"></i><br/>Mensagens</a>
                        <a href="#" class="btn btn-sq btn-info"><i class="fa fa-bullhorn fa-5x"></i><br/>Minha loja</a>
                        <a href="{{ route('users.edit') }}" class="btn btn-sq btn-info"><i class="fa fa-user fa-5x"></i><br/>Meus dados</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 50px"></div>
            </div>
        </div> 

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copyright">&copy; 2015 - Todos os direitos reservados.</div>
                </div>
            </div>
        </div>

        <!-- google web fonts -->
        <script>
            WebFontConfig = {
                google: {
                    families: [
                        'Source+Code+Pro:400,700:latin',
                        'Roboto:400,300,500,700,400italic:latin'
                    ]
                }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>
        <!-- common functions -->
        <script src="/theme/altair/assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="/theme/altair/assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="/theme/altair/assets/js/altair_admin_common.min.js"></script>

        <script>
            $(function() {
                // enable hires images
                altair_helpers.retina_images();
                // fastClick (touch devices)
                if(Modernizr.touch) {
                    FastClick.attach(document.body);
                }
            });
        </script>

        <!--  forms advanced functions -->
        <script src="/theme/altair/bower_components/ionrangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="/theme/altair/assets/js/pages/forms_advanced.min.js"></script>

    </body>
</html>