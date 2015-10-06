@extends('app')

@section('content')

    <div class="row">
        <h1 class="col-md-4 col-md-offset-4 text-center">Completed Trials</h1>
        <h4 class="col-md-4 text-right">
            Expected: {{ number_format($chance, 1) }}%,
            Actual: {{ number_format($actual, 1) }}%
        </h4>
    </div>

    @if ($history->count() > 0)
        @foreach($history->chunk(3) as $chunk)
            <div class="row">

                @foreach($chunk as $trial)

                    <div class="col-md-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        Experiment {{ $trial->experiment->id }}
                                    </div>
                                    <div class="col-md-6 text-right">
                                        {{ $trial->experiment->start_date->format('m-d-Y') }}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="well well-sm bg-info">{{ $trial->experiment->getTarget()->location->name }}</div>
                                <hr />
                                @foreach($trial->experiment->targets as $t)
                                    @if ($trial->selections->contains($t->id))
                                        @if ($t->is_decoy)
                                            <p class="alert-danger">{{ $t->location->name }}</p>
                                        @else
                                            <p class="alert-success">{{ $t->location->name }}</p>
                                        @endif
                                    @else
                                        <p>{{ $t->location->name }}</p>
                                    @endif
                                @endforeach
                                <hr />
                                @if ($trial->success())
                                    <h3 class="text-center success">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </h3>
                                @else
                                    <h3 class="text-center danger">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </h3>
                                @endif
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @endforeach
    @else
        <div class="well">You have not completed any trials yet. Check
            <a href="/home">your Home Page</a> to see if any trials are available.
        </div>
    @endif

@stop