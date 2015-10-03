<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Confirmation</h4>
            </div>
            <div class="panel-body">

                <div class="well well-sm">
                    Please review your selection(s). Once confirmed, choices cannot be
                    changed. The correct target will be revealed once the experiment is
                    closed.
                </div>

                <h4 class="text-center">Your Selections</h4>

                <table class="table">
                    @foreach($active->experiment->targets as $t)
                        @if ($active->selections->contains($t->id))
                            <tr class="row">
                                <td>
                                    <a href="{{ $t->location->link }}" target="_blank">
                                        {{ $t->location->name }}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

                {!! Form::open(['action' => 'TrialsController@walkthrough']) !!}
                {!! Form::hidden('stage', 'confirm') !!}
                {!! Form::hidden('trialId', $active->id) !!}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            {!! Form::submit('Edit', [
                                'class' => 'btn btn-primary form-control',
                                'name' => 'Edit'
                            ]) !!}
                        </div>
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('Confirm', [
                                'class' => 'btn btn-primary form-control',
                                'name' => 'Confirm'
                            ]) !!}
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



