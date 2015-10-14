@extends('app')

@section('content')

<div class="row">
    <h1 class="col-md-3"></h1>
    <h1 class="text-center col-md-6">Experiments</h1>
    <h1 class="text-right col-md-3"><a href="{{ action('ExperimentsController@create') }}" class="btn btn-primary">New</a></h1>
</div>

@if ($experiments->count() > 0)

    <table class="table">

        <tr>
            <th class="col-md-1">ID</th>
            <th class="col-md-2">Date</th>
            <th class="col-md-1"></th>
            <th class="col-md-2">Target</th>
            <th class="col-md-5">Coordinates</th>
            <th class="col-md-1"></th>
        </tr>

    @foreach($experiments as $experiment)
        <tr>
            <td>
                {{ $experiment->id }}
            </td>
            <td>
                {{ $experiment->start_date->format('D n/j/y g:i a') }}
            </td>
            <td>
                <a href="{{ action('ExperimentsController@edit', $experiment->id) }}" class="btn btn-primary">
                    Edit
                </a>
            </td>
            <td>
                {{--For some reason I can't get target as object, just as collection, so I have to iterate :/  --}}
                @foreach($experiment->target as $target)
                    <a href="{{ $target->location->link }}" target="_blank">
                        {{ $target->location->name }}
                    </a>
                @endforeach
            </td>
            <td>
                {{--For some reason I can't get target as object, just as collection, so I have to iterate :/  --}}
                @foreach($experiment->target as $target)
                        {{ $target->coordinates }}
                @endforeach
                {{--// don't show the decoys - "bleedthrough?"--}}
                {{--@foreach($experiment->decoys as $decoy)--}}
                    {{--<div class="col-md-3"><a href="{{ $decoy->location->link }}">{{ $decoy->location->name }}</a></div>--}}
                {{--@endforeach--}}
            </td>
            <td>
                {!! Form::open(['url' => 'experiments/' . $experiment->id, 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger form-control']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach

    </table>
@else
    <div class="alert">There Are No Experiments</div>
@endif



@stop