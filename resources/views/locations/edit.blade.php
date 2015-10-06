@extends('app')

@section('content')

    <div class="text-center">Edit a Location</div>

    {!! Form::model($location, ['action' => ['LocationsController@update', $location->id], 'method' => 'PATCH']) !!}

    @include('locations.form')

    {!! Form::close() !!}


@stop
