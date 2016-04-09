<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Express</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Blog Express</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @if(count($categories))
                        <li class="dropdown">
                            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a> 
                            <ul class="dropdown-menu" aria-labelledby="drop1">
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endIf
                    </ul>

                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Footer -->
        <footer>
            <div class="footer" id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3><a href="#">Home</a></h3>
                        </div>
                        @if(count($categories))
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3>Categories</h3>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endIf
                        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 pull-right">
                            <h3>Social</h3>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/.row--> 
                </div>
                <!--/.container--> 
            </div>
            <!--/.footer-->

            <div class="footer-bottom">
                <div class="container">
                    <p class="pull-left"> Copyright © Roberto Mariano - Blog Express. All right reserved. </p>
                </div>
            </div>
            <!--/.footer-bottom--> 
        </footer>

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
