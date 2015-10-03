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
                    <a href="{{ $target->location->link }}" target="_blank">
                        {{ $target->location->name }}
                    </a>
                </div>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'reveal') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    {!! Form::submit('Next Experiment', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>



