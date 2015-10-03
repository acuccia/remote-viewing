<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Begin</h4>
            </div>
            <div class="panel-body">

                <div class="well bg-warning">
                    Use these coordinates for your session.
                    When you are done, move on to step 2.
                </div>

                <h4 class="text-center">Coordinates</h4>
                <div class="well well-sm text-center">
                    <h3>{{ implode(' ',str_split($target->coordinates )) }}</h3>
                </div>

                <a class="btn btn-primary btn-block" href="{{ action('TrialsController@setStage', ['id' => $active->id, 'stage' => $active->stage+1]) }}">
                    Go to Step 2
                </a>
            </div>
        </div>
    </div>
</div>