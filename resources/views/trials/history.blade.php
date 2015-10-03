<h1>Completed Trials</h1>

@foreach($history->chunk(3) as $chunk)

    <div class="row">

        @foreach($chunk as $trial)

            <div class="col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        Experiment #{{ $trial->experiment->id }} ({{ $trial->experiment->start_date->format('m-d-Y') }})
                    </div>
                    <div class="panel-body">
                        @foreach($trial->experiment->targets as $t)
                            <p>
                                {{ $t->location->name }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endforeach
