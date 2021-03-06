<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Begin</h4>
            </div>
            <div class="panel-body">
                <div class="well bg-warning">
                    When you are ready to begin, click to
                    retrieve the coordinates for this experiment
                </div>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'start') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    {!! Form::submit('Get Coordinates', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
