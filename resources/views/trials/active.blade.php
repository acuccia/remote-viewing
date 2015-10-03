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
