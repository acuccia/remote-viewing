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

    <div class="form-group">
        {!! Form::label('coordinates', 'Coordinates:') !!}
        {!! Form::text('coordinates', null, ['class' => 'form-control']) !!}

        {!! Form::label('start_date', 'Start Date:') !!}
        {!! Form::input('date', 'start_date', date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"))), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@stop


