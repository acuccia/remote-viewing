<h1>Experiment #{{ $active->experiment->id }}</h1>

@if ($active->stage == 1)
    @include('trials.start')
@elseif($active->stage == 2)
    @include('trials.view')
@elseif($active->stage == 3)
    @include('trials.feedback')
@elseif($active->stage == 4)
    @include('trials.evaluate')
@elseif($active->stage == 5)
    @include('trials.confirm')
@elseif($active->stage == 6)
    @include('trials.reveal')
@endif

{{--@if ($active->finished_session)--}}
    {{--<div class="col-md-4">--}}
        {{--@if ( ! $active->complete)--}}
        {{--<div class="panel panel-success">--}}
        {{--@else--}}
        {{--<div class="panel panel-default">--}}
        {{--@endif--}}
            {{--<div class="panel-heading text-center">--}}
                {{--<h4>Step 2</h4>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--@if ($active->received_choices)--}}
                    {{--{!! Form::open(['action' => 'TrialsController@score']) !!}--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-md-10 text-left">--}}
                            {{--<a href="{{ $active->experiment->target->location->link }}">--}}
                                {{--{{ $active->experiment->target->location->name }}--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-2 text-right">--}}
                            {{--{!! Form::checkbox('location1', '0') !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--@foreach($active->experiment->decoys as $location)--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-10">--}}
                                {{--<a href="{{ $location->link }}">{{ $location->name }}</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2 text-right">--}}
                                {{--{!! Form::checkbox('location2', 0) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}

                    {{--<h3>Instructions</h3>--}}
                    {{--<div class="well bg-warning">--}}
                        {{--Click the links to evaluate each location. Select the one--}}
                        {{--that best matches your session. If necessary, select more--}}
                        {{--than one location.--}}
                    {{--</div>--}}
                        {{----}}
                    {{--{!! Form::close() !!}--}}
                {{--@else--}}
                    {{--<div class="row text-center">--}}
                        {{--<div class="col-md-8 col-md-offset-2">--}}
                            {{--<a class="btn btn-primary btn-block" href="#">Show Locations</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}
    {{----}}
                    {{--<div class="col-md-3 col-md-offset-1">--}}
                        {{--<h2 class="text-center">Locations</h2>--}}
                        {{--<p>--}}
                            {{--<a href="{{ $active->experiment->target->location->link }}">--}}
                                {{--{{ $active->experiment->target->location->name }}--}}
                            {{--</a>--}}
                        {{--</p>--}}
                        {{--@foreach($active->experiment->decoys as $location)--}}
                            {{--<p>--}}
                                {{--<a href="{{ $location->link }}">--}}
                                    {{--{{ $location->name }}--}}
                                {{--</a>--}}
                            {{--</p>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
{{--</div>--}}
