@extends('app')


@section('content')

    @if ($active != null)
        @include('trials.active')
     @else
        <h1 class="text-center">No Active Experiment</h1>
        @if ($next != null)
            <h3 class="text-center">
                The next experiment will be available on {{ $next->start_date->format('m/d/Y') }}
            </h3>
        @endif

    @endif

@stop
