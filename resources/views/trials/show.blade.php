@extends('app')

@section('content')

    <h1>User: {{ $trial->user->name }}, Experiment: {{ $trial->experiment->id }}</h1>

    <p class="text-center">Targets</p>
    <table class="table">
        @foreach($trial->experiment->targets as $target)

            <tr class="row">
                @if ($target->is_decoy)
                    <td class="decoy">{{ $target->location->name }}</td>
                @else
                    <td class="success">{{ $target->location->name }}</td>
                @endif
                <td>{{ $target->is_decoy }}</td>
                <td>{{ $target->coordinates }}</td>
            </tr>

        @endforeach
    </table>

    <p class="text-center">Selections</p>
    <table class="table">
        @foreach($trial->selections as $selection)

            <tr class="row">
                @if ($selection->is_decoy)
                    <td class="decoy">{{ $selection->location->name }}</td>
                @else
                    <td class="success">{{ $selection->location->name }}</td>
                @endif
                <td>{{ $selection->is_decoy }}</td>
            </tr>

        @endforeach
    </table>

@stop
