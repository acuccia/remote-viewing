@extends('app')

@section('content')

    <div class="row">
        <h1 class="col-md-6 text-left">Create a New Experiment</h1>
        <h1 class="col-md-6 text-right">{{ $free }} unused locations</h1>
    </div>
    <hr>

    {!! Form::open(['action' => 'ExperimentsController@store']) !!}

    <h3>1. View the target</h3>
    <p><a href="{{ $location->link }}" target="_blank">{{ $location->name }}</a></p>
    <p><a href="{{ $location->link }}" target="_blank">{{ $location->link}}</a></p>

    <h3>2. Assign Coordinates</h3>

    {!! Form::hidden('location_id', $location->id) !!}

    {!! Form::label('coordinates', 'Coordinates:') !!}
    {!! Form::text('coordinates') !!}

    {!! Form::submit('Assign') !!}

    {!! Form::close() !!}

@stop


