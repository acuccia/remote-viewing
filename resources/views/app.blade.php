<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            background: url('eye.jpg');
            background-size: 1440px 800px;
        }
    </style>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">remote viewing</a>
            </div>

                <ul class="nav navbar-nav">
                    <li><a href="{{ action('PagesController@home') }}">Home</a></li>
                    <li><a href="{{ action('PagesController@about') }}">About</a></li>
                    @if (Auth::check() and Auth::user()->is_admin)
                        <li><a href="{{ action('LocationsController@index') }}">Locations</a></li>
                        <li><a href="{{ action('ExperimentsController@index') }}">Experiments</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
                    @else
                        <li><a href="#">Logged in as {{ Auth::user()->name }}</a></li>
                        <li><a href="{{ action('Auth\AuthController@getLogout') }}">Log out</a></li>
                    @endif

                </ul>
        </div><!-- /.container-fluid -->
    </nav>

    @yield('content')

</div>

</body>
</html>