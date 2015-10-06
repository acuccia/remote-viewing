@extends('app')

@section('content')

    <div class="row">
        <h1 class="text-center">Edit This Experiment</h1>
    </div>

    <hr>

    {!! Form::model($experiment, ['action' => ['ExperimentsController@update', $experiment->id], 'method' => 'PATCH']) !!}

        <h3>Targets</h3>
        @foreach($experiment->targets as $target)
            <p><a href="{{ $target->location->link }}" target="_blank">{{ $target->location->name }}</a></p>
        @endforeach

    <hr>

    <div class="form-group">
            {!! Form::label('start_date', 'Start Date:') !!}
            {!! Form::input('date', 'start_date', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}

@stop
