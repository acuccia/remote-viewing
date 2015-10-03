@extends('app')

@section('content')

<div class="row">
    <h1 class="col-md-3"></h1>
    <h1 class="text-center col-md-6">Experiments</h1>
    <h1 class="text-right col-md-3"><a href="{{ action('ExperimentsController@create') }}">New</a></h1>
</div>

@if ($experiments->count() > 0)

    <table class="table">

        <tr>
            <th class="col-md-1">ID</th>
            <th class="col-md-3">Target</th>
            <th class="col-md-8">Decoys</th>
        </tr>

    @foreach($experiments as $experiment)
        <tr>
            <td>{{ $experiment->id }}</td>
            <td>
                <div class="col-md-10">
                    @foreach($experiment->target as $target)
                        <a href="{{ $target->location->link }}">
                            {{ $target->location->name }}
                        </a>
                    @endforeach
                </div>
            </td>
            <td>
                @foreach($experiment->decoys as $decoy)
                    <div class="col-md-3"><a href="{{ $decoy->location->link }}">{{ $decoy->location->name }}</a></div>
                @endforeach
            </td>
        </tr>
    @endforeach

    </table>
@else
    <div class="alert">There Are No Experiments</div>
@endif



@stop