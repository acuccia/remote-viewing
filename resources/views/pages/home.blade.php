@extends('app')


@section('content')

    @if ($active != null)
        @include('trials.active')
     @else
        <h1 class="text-center">No Active Experiment</h1>
        @if ($next != null)
            <h3 class="text-center">
                The next experiment will be available {{ $next->start_date->diffForHumans() }}
            </h3>
        @endif

    @endif

    @if (Auth::user()->trials()->whereComplete(true)->count() > 0)
        <hr />
        <h4 class="text-center">
            View your <a href="{{ action('TrialsController@history') }}">past experiments</a>
        </h4>

    @endif

@stop
