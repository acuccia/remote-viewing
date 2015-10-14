@extends('app')

@section('content')

<div class="row">
    <h1 class="col-md-4 col-md-offset-4 text-center">Locations ({{ $locations->count() }})</h1>
    <h1 class="col-md-4 text-right">
        <a href="locations/create" class="btn btn-primary">New</a>
    </h1>
</div>

@if ($locations->count() > 0)

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Link</th>
        </tr>
    @foreach($locations as $location)

        <tr>
            <td>{{ $location->name }}</td>
            <td>{{ $location->link }}</td>
            <td>
                {!! Form::open(['url' => 'locations/' . $location->id, 'method' => 'DELETE']) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
                </div>
                {!! Form::close() !!}

            </td>
            <td>
                <a href="{{ action('LocationsController@edit', $location->id) }}" class="btn btn-primary">
                    Edit
                </a>
            </td>
        </tr>

    @endforeach

    </table>

@else
    <div class="text-danger">There are no locations</div>
@endif

@stop