@extends('app')

@section('content')

    <h1 class="text-center">Statistics</h1>

    {{--compact('totalUsers', 'totalTrials', 'totalHits', 'totalSelections', 'totalChoices'));--}}

    <p>Total Users: {{ $totalUsers }}</p>
    <p>Total Trials: {{ $totalTrials }}</p>
    <p>Total Choices: {{ $totalChoices }}</p>
    <p>Total Selections: {{ $totalSelections }}</p>
    <p>Total Hits: {{ $totalHits }}</p>

    <hr />

    <p>Expected %: {{ number_format(100*($totalSelections/$totalChoices), 1) }}</p>
    <p>Actual %: {{ number_format(100*($totalHits/$totalTrials), 1) }}</p>

    <hr />

    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <tr>
                    <th class="col-md-1">Picks</th>
                    <th class="col-md-8">Name</th>
                    <th class="col-md-3"></th>
                </tr>
                @foreach($targets as $target)
                    <tr>
                        <td>{{ $target->selections()->count() }}</td>
                        <td>{{ $target->location->name }}</td>
                        <td>{{ $target->is_decoy ? '' : $target->coordinates }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@stop
