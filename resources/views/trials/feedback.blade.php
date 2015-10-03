<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Step 2</h4>
            </div>
            <div class="panel-body">

                <div class="well well-sm">
                    Enter any notes you have for this viewing. Once you move
                    on, you will not be able to edit these notes.
                </div>

                <h4 class="text-center">Notes</h4>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'feedback') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    {!! Form::textarea('notes', $active->notes, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Go to Step 3', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>