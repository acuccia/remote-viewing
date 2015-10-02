<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Experiment Complete!</h4>
            </div>
            <div class="panel-body">

                <div class="well well-sm">
                    Here is the actual target for this experiment.
                </div>

                <h4 class="text-center">Target</h4>

                <div class="well">
                    <a href="{{ $active->experiment->target->location->link }}" target="_blank">
                        {{ $active->experiment->target->location->name }}
                    </a>
                </div>

                <a class="btn btn-primary" href="{{ action('TrialsController@next', $active->id) }}">
                    Next Experiment
                </a>

            </div>
        </div>
    </div>
</div>



