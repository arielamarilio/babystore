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

        <link rel="stylesheet" href="/theme/front-end/css/bootstrap.3.min.css">
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

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/theme/front-end/css/social.css" />

        <link rel="stylesheet" href="/theme/front-end/css/findcon-navbar.css" />

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

                                    <li><a href=""></a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <form class="navbar-form navbar-right search-form" role="search">
                        <input type="text" class="form-control" placeholder="Pesquisar produtos" />
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                
                <div class="col-md-12" style="height: 50px">
                    asdad
                </div>

            </div>
        </div>

        @yield('content')
        

        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-xs-6 social" style="text-align: center;">
                    <ul>
                        <li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-youtube"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copyright">&copy; 2015 - Todos os direitos reservados.</div>
                </div>
            </div>
        </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/theme/front-end/js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="/theme/front-end/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="/theme/front-end/js/jquery.fitvids.js"></script>
        <script src="/theme/front-end/js/jquery.sequence-min.js"></script>
        <script src="/theme/front-end/js/jquery.bxslider.js"></script>
        <script src="/theme/front-end/js/main-menu.js"></script>
        <script src="/theme/front-end/js/template.js"></script>


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

        @yield('extra-include')

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

    </body>
</html>