<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Step 2</h4>
            </div>
            <div class="panel-body">

                <div class="well well-sm">
                    Click each link and see how well each item matches your viewing session.
                    Select the one you think was the target for the coordinates you were given.
                    If you are unsure, multiple items can be selected.
                </div>

                <h4 class="text-center">Possible Targets</h4>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'evaluate') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    <table class="table">
                        @foreach($active->experiment->targets as $t)
                            <tr class="row">
                                <td>
                                    <a href="{{ $t->location->link }}" target="_blank">
                                        {{ $t->location->name }}
                                    </a>
                                </td>
                                <td>
                                    @if ($active->selections->contains($t->id))
                                        <input name="targets[]" type="checkbox" value="{{ $t->id }}" checked>
                                    @else
                                        <input name="targets[]" type="checkbox" value="{{ $t->id }}">
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



