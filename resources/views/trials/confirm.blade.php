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
                        @if($t->is_decoy)
                            <tr class="row">
                        @else
                            <tr class="row rowhighlight">
                        @endif
                                <td> {{ $t->location->name }}</td>
                                <td>*selected*</td>
                            </tr>
                    @endforeach
                    {{--<tr class="row">--}}
                        {{--<td>--}}
                            {{--<a href="{{ $active->experiment->target->location->link }}" target="_blank">--}}
                                {{--{{ $active->experiment->target->location->name }}--}}
                            {{--</a>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                            {{--selected--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                    {{--@foreach($active->experiment->decoys as $location)--}}
                        {{--<tr class="row">--}}
                            {{--<td>--}}
                                {{--<a href="{{ $location->link }}" target="_blank">{{ $location->name }}</a>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{-----}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}

                </table>

                <div class="row">
                    <div class="col-md-4 col-md-offset-1">
                        <a class="btn btn-primary btn-block" href="{{ action('TrialsController@edit', $active->id) }}">Edit</a>
                    </div>
                    <div class="col-md-4 col-md-offset-2">
                        <a class="btn btn-primary btn-block" href="{{ action('TrialsController@confirm', $active->id) }}">Confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



