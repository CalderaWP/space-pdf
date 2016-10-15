<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Caldera Space: Caldera Forms to PDF</title>

    <meta name="description" content="Print Caldera Forms results or save as PDF."/>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="http://caldera.space/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Caldera PDF" />
    <meta property="og:description" content="Print Caldera Forms results or save as PDF." />
    <meta property="og:url" content="http://caldera.space/" />
    <meta property="og:site_name" content="Caldera Forms PDF" />
    <meta property="og:image" content="https://caldera.space/images/caldera-forms-pdf.png" />
    <meta property="og:image:width" content="772" />
    <meta property="og:image:height" content="250" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Print Caldera Forms results or save as PDF." />
    <meta name="twitter:title" content="Caldera Forms PDF: Print Caldera Forms results or save as PDF." />
    <meta name="twitter:image" content="https://caldera.space/images/caldera-forms-pdf.png" />

    <!-- Styles -->
    <link href="//cdn.jsdelivr.net/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="//d1dy2qw4671tuy.cloudfront.net/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//d1dy2qw4671tuy.cloudfront.net/css/animate.css">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        #header .logo > * {
            display: inline-block;
            vertical-align: middle;
            color: white;
        }
        .panel-default>.panel-heading {
            color: #fff;
            text-align: center;
            background-color: #3a3a3c;
            border-color: #cfcfcf;
        }
        .panel-heading {
            font-weight: 900;
            line-height: 1.5;
            margin: 0 0 2em 0;
            text-transform: uppercase;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        .jumbotron {
            background: #4b4b4b;
            color: #fff;
        }

        .jumbotron p {
            font-weight: 500;
            padding: 12px;
        }

        .jumbotron h2 {
            text-align:center;
        }

        .jumbotron-alt {
            background: #cfcfcf;
            color: #333;
        }

        h2#pricing {
            background: #a3bf61;
            padding: 12px;
            text-align: center;
            color: #fff;
            font-size: 1.5em;
        }

        .panel{
            margin-top: 20px;
        }

    </style>
</head>
<body>
<div id="wrapper">

    <section id="header"><!-- start header section -->
        <header><!-- start header -->
            <div class="container">
                <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="100">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="https://Caldera.space" class="logo  navbar-brand">
                            <span class="symbol"><img src="//d1dy2qw4671tuy.cloudfront.net/images/caldera-globe-logo-sm.png" class="img-responsive" alt="Caldera Labs Globe Logo"></span>
                            <span class="title">Caldera Forms PDF</span>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        <li>
                                            <a href="{{ url( '/subscription') }}">
                                                Manage Subscription
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="https://calderawp.com/doc/caldera-forms-pdf-getting-started/" target="_blank" title="Caldera Forms PDF Documentation">
                                    Documentation
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </header>
    </section><!-- end collapsed -->



    <section id="main-contain"><!-- start main-contain -->
        @yield('content')
    </section><!--#main-contain -->

    <footer id="footer">
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="list-inline">
                            <li><a href="#"><img src="//d1dy2qw4671tuy.cloudfront.net/images/caldera-globe-logo-sm.png" class="img-responsive" alt=".." width="43"></a></li>
                            <li><a href="https://CalderaForms.com" class="ft-space">Caldera Forms</a></li>
                            <li><a href="http://CalderaLabs.org" class="ft-space">Caldera Labs</a></li>
                            <li><a href="https://IngotHQ.com" class="ft-space">Ingot</a></li>
                            <li><a href="http://CalderaWP.com/contact" class="ft-space">Contact</a></li>

                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social_icons list-inline">
                            <li><a href="https://Twitter.com/CalderaWP" class="fa fa-twitter"><span class="screen-reader-text">Twitter</span> </a></li>
                            <li><a href="https://Facebook.com/https://Twitter.com/CalderaWP" class="fa fa-facebook"><span class="screen-reader-text">Facebook</span> </a></li>
                            <li><a href="https://www.youtube.com/playlist?list=PLgeaHmX3MoiuXOhRlDdYn7k0RcL4afLzQ" class="fa fa-youtube"><span class="screen-reader-text">YouTube</span> </a></li>
                            <li><a href="https://Github.com/CalderaWP" class="fa fa-github"></a><span class="screen-reader-text">Github</span> </li>
                            <li><a href=http://CalderaWP.com/contact" class="fa fa-envelope-o"><span class="screen-reader-text">Contact</span> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.easing/1.3/jquery.easing.1.3.min.js"></script>
</body>
</html>
