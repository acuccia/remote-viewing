@extends('app')

@section('content')

<h1 class="text-center">Locations</h1>

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
        </tr>

    @endforeach

    </table>

@else
    <div class="text-danger">There are no locations</div>
@endif

@stop