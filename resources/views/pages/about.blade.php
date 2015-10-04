@extends('app')


@section('content')

    <h1 class="text-center">About This Project</h1>
    @if (Auth::guest())
        <p class="text-center">You are not logged in. <a href="/auth/login">Log in here</a> to start viewing!</p>
    @endif


    <div class="jumbotron">

        <p>
            This project aims to test the technique of Remote Viewing through
            a series of trials in which the viewer attempts to select a
            particular location (the "target") from amongst a group of non-target
            locations. The hypothesis is that a remote viewer will be able to
            pick out the target better than would be predicted by chance alone.
        </p>

    </div>
@stop

