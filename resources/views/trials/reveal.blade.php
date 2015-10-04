<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Experiment Complete!</h4>
            </div>
            <div class="panel-body">

                <h4 class="text-center">Target</h4>

                <div class="well">
                    <a href="{{ $target->location->link }}" target="_blank">
                        {{ $target->location->name }}
                    </a>
                </div>

                <h4 class="text-center">
                    And these are your choices:
                </h4>

                <table class="table">
                    @foreach($active->experiment->targets as $t)
                        @if ($active->selections->contains($t->id))
                            <tr class="row">
                                <td>
                                    <a href="{{ $t->location->link }}" target="_blank">
                                        {{ $t->location->name }}
                                    </a>
                                </td>
                                @if ($t->is_decoy)
                                    <td class="alert-danger text-center">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </td>
                                @else
                                    <td class="success text-center">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </td>
                                @endif

                                </td>

                            </tr>
                        @endif
                    @endforeach
                </table>
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



