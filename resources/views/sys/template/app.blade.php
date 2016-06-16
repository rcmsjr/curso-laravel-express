<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel</title>

        @section('stylesheets')
        <link href="{{ asset('/assets/vendor/bootstrap/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/sys/css/main.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

        @show

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navigation Bar -->
        <header id="topnav">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- LOGO -->
                        <div class="pull-left logo">
                            <span>Admin <span>Panel</span></span>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#"><span><i class="fa fa-area-chart" aria-hidden="true"></i></span> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa fa-child" aria-hidden="true"></i></span> <span>Authors</span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa fa-tag" aria-hidden="true"></i></span> <span>Categories</span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa fa-newspaper-o" aria-hidden="true"></i></span> <span>Posts</span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa fa-hashtag" aria-hidden="true"></i></span> <span>Tags</span></a>
                            </li>
                            <li>
                                <a href="#"><span><i class="fa fa-users" aria-hidden="true"></i></span> <span>Users</span></a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#"><span><i class="fa fa-home" aria-hidden="true"></i></span> <span>Look Site</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-user" aria-hidden="true"></i></span> <span>{{ Auth::user()->name }}</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> <span>My Account</span></a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#"><span><i class="fa fa-power-off" aria-hidden="true"></i></span> <span>Logout</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!-- End Navigation Bar -->

        <div class="wrapper">
            @yield('content')
        </div>
        <!-- End Wraper-->

        @section('scripts')
        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

        @show

    </body>
</html>
