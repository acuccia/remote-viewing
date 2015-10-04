@extends('app')

@section('content')

<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
    {!! csrf_field() !!}

    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Login</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control input-sm" value="{{ old('email') }}"placeholder="Email Address">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control input-sm" placeholder="Password">
                    </div>

                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                            {{--<a href="auth/forgot" class="pull-right">Forgot Password?</a>--}}
                        </label>
                    </div>

                    <input type="submit" value="Login" class="btn btn-info btn-block">

                </div>
            </div>
            <div class="text-center h3">
                <a href="{{ action('Auth\AuthController@getRegister') }}">
                    Don't have an account? Register
                </a>
            </div>
        </div>
    </div>
</form>

@stop
