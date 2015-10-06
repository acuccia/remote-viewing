@extends('app')

@section('content')

    <h1 class="text-center">Add a Location</h1>

    {!! Form::open(['action' => 'LocationsController@store']) !!}

    @include('locations.form')

    {!! Form::close() !!}

@stop
