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

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/theme/front-end/js/jquery-1.9.1.min.js"><\/script>')</script>
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
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
            <div class="container">
                <div class="menuextras">
                    <div class="extras">
                        <ul>
                            @if (Auth::guest())
                                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                                <li>ou</li>
                                <li><a href="{{ url('/auth/register') }}">Faça seu cadastro</a></li>
                            @else
                                <li>Olá, {{ Auth::user()->name }}, </li>
                                <li><a href="{{ route('users.edit') }}" >Meus dados</a></li>
                                <li><a href="{{ url('/auth/logout') }}" >Sair</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <nav id="mainmenu" class="mainmenu">
                    <ul>
                        <li class="logo-wrapper"><a href="index.html"><img src="/theme/front-end/img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                        <li class="active">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Produtos +</a>
                            <div class="mainmenu-submenu">
                                <div class="mainmenu-submenu-inner"> 
                                    <div>
                                        <h4>Homepage</h4>
                                        <ul>
                                            <li><a href="index.html">Homepage (Sample 1)</a></li>
                                            <li><a href="page-homepage-sample.html">Homepage (Sample 2)</a></li>
                                        </ul>
                                        <h4>Services & Pricing</h4>
                                        <ul>
                                            <li><a href="page-services-1-column.html">Services/Features (Rows)</a></li>
                                            <li><a href="page-services-3-columns.html">Services/Features (3 Columns)</a></li>
                                            <li><a href="page-services-4-columns.html">Services/Features (4 Columns)</a></li>
                                            <li><a href="page-pricing.html">Pricing Table</a></li>
                                        </ul>
                                        <h4>Team & Open Vacancies</h4>
                                        <ul>
                                            <li><a href="page-team.html">Our Team</a></li>
                                            <li><a href="page-vacancies.html">Open Vacancies (List)</a></li>
                                            <li><a href="page-job-details.html">Open Vacancies (Job Details)</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>Our Work (Portfolio)</h4>
                                        <ul>
                                            <li><a href="page-portfolio-2-columns-1.html">Portfolio (2 Columns, Option 1)</a></li>
                                            <li><a href="page-portfolio-2-columns-2.html">Portfolio (2 Columns, Option 2)</a></li>
                                            <li><a href="page-portfolio-3-columns-1.html">Portfolio (3 Columns, Option 1)</a></li>
                                            <li><a href="page-portfolio-3-columns-2.html">Portfolio (3 Columns, Option 2)</a></li>
                                            <li><a href="page-portfolio-item.html">Portfolio Item (Project) Description</a></li>
                                        </ul>
                                        <h4>General Pages</h4>
                                        <ul>
                                            <li><a href="page-about-us.html">About Us</a></li>
                                            <li><a href="page-contact-us.html">Contact Us</a></li>
                                            <li><a href="page-faq.html">Frequently Asked Questions</a></li>
                                            <li><a href="page-testimonials-clients.html">Testimonials & Clients</a></li>
                                            <li><a href="page-events.html">Events</a></li>
                                            <li><a href="page-404.html">404 Page</a></li>
                                            <li><a href="page-sitemap.html">Sitemap</a></li>
                                            <li><a href="page-login.html">Login</a></li>
                                            <li><a href="page-register.html">Register</a></li>
                                            <li><a href="page-password-reset.html">Password Reset</a></li>
                                            <li><a href="page-terms-privacy.html">Terms & Privacy</a></li>
                                            <li><a href="page-coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h4>eShop</h4>
                                        <ul>
                                            <li><a href="page-products-3-columns.html">Products listing (3 Columns)</a></li>
                                            <li><a href="page-products-4-columns.html">Products listing (4 Columns)</a></li>
                                            <li><a href="page-products-slider.html">Products Slider</a></li>
                                            <li><a href="page-product-details.html">Product Details</a></li>
                                            <li><a href="page-shopping-cart.html">Shopping Cart</a></li>
                                        </ul>
                                        <h4>Blog</h4>
                                        <ul>
                                            <li><a href="page-blog-posts.html">Blog Posts (List)</a></li>
                                            <li><a href="page-blog-post-right-sidebar.html">Blog Single Post (Right Sidebar)</a></li>
                                            <li><a href="page-blog-post-left-sidebar.html">Blog Single Post (Left Sidebar)</a></li>
                                            <li><a href="page-news.html">Latest & Featured News</a></li>
                                        </ul>
                                    </div>
                                </div><!-- /mainmenu-submenu-inner -->
                            </div><!-- /mainmenu-submenu -->
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-sm-3 blog-sidebar">
                        <h4>Canais</h4>
                        <ul class="blog-categories">
                            <li><a href="{{ route('users.edit') }}">Meus dados</a></li>
                            <li><a href="{{ route('products') }}">Meus produtos</a></li>
                            <li><a href="{{ url('/auth/logout') }}">Sair</a></li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div class="col-sm-9">
                        @yield('content')
                    </div>
                    <!-- End Blog Post -->
                </div>
            </div>
        </div>

        <!-- Footer
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-copyright">&copy; 2015 All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
         -->

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

        <!-- page specific plugins -->
        <script src="/theme/altair/bower_components/ionrangeslider/js/ion.rangeSlider.min.js"></script>
        <!-- inputmask-->
        <script src="/theme/altair/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>
        <!--  forms advanced functions -->
        <script src="/theme/altair/assets/js/pages/forms_advanced.min.js"></script>

    </body>
</html>