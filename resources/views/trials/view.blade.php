<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Step 1</h4>
            </div>
            <div class="panel-body">

                <div class="well bg-warning">
                    Use these coordinates to imagine what the
                    target looks or feels like. It may be helpful
                    to make some notes so that you can remember what
                    came to mind. When you are ready, go to step 2.
                </div>
                <h4 class="text-center">Coordinates</h4>
                <div class="well well-sm text-center">
                    <h3>{{ implode(' ',str_split($target->coordinates )) }}</h3>
                </div>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'view') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    {!! Form::submit('Go to Step 2', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>