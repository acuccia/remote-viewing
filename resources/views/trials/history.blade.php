@extends('app')

@section('content')

    <h1 class="text-center">Completed Trials</h1>

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
                                    <h3 class="text-center">Hit</h3>
                                @else
                                    <h3 class="text-center">Miss</h3>
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