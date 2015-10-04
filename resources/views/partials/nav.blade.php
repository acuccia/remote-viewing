<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">remote viewing</a>
        </div>

        <ul class="nav navbar-nav">
            <li><a href="{{ action('PagesController@about') }}">About</a></li>
            <li><a href="{{ action('PagesController@home') }}">Home</a></li>
            @if (Auth::check())
                <li><a href="{{ action('TrialsController@history') }}">History</a></li>
            @endif
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
