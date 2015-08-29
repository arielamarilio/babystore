<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Baby store</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/shop-homepage.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script> 


    <!-- uikit -->
    <link rel="stylesheet" href="/theme/altair/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">
    <!-- flag icons -->
    <link rel="stylesheet" href="/theme/altair/assets/icons/flags/flags.min.css" media="all">
    <!-- altair admin -->
    <link rel="stylesheet" href="/theme/altair/assets/css/main.min.css" media="all">

</head>

<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Canais</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Produtos</a>
                    <a href="#" class="list-group-item">Marcas</a>
                    <a href="#" class="list-group-item">Bazares</a>
                </div>

                <p class="lead">Meus dados</p>

                @if (Auth::guest())
                    <a href="{{ url('/auth/login') }}" class="list-group-item">Login</a>
                    <a href="{{ url('/auth/register') }}" class="list-group-item">Registre-se</a>
                @else
                    <h5>Olá, {{ Auth::user()->name }}.</h5>
                    <div class="list-group">
                        <a href="{{ route('users.edit') }}"  class="list-group-item">Meus dados</a>
                        <a href="{{ route('products') }}"  class="list-group-item">Produtos</a>
                        <a href="{{ url('/auth/logout') }}"  class="list-group-item">Sair</a>
                    </div>
                @endif

                
            </div>

            <div class="col-md-9">

                @yield('content')

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Pequeno bazar 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

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

</body>

</html>
