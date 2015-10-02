<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Step 1</h4>
            </div>
            <div class="panel-body">
                <div class="well bg-warning">
                    When you are ready to begin your session, click to
                    retrieve the coordinates for this experiment
                </div>
                <a class="btn btn-primary btn-block" href="{{ action('TrialsController@setStage', ['id' => $active->id, 'stage' => $active->stage+1]) }}">
                    Get Coordinates
                </a>
            </div>
        </div>
    </div>
</div>
