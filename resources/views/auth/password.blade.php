@extends('app')


@section('content')

<form method="POST" action="/password/email">
    {!! csrf_field() !!}

    <div>
        Enter the email address you signed up with, hit the button,
        then check your email for a password reset link
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>

@stop
