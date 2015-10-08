<h1 class="text-center">Experiment {{ $active->experiment->id }}</h1>

@if ($active->stage == 'start')
    @include('trials.start')
@elseif($active->stage == 'view')
    @include('trials.view')
@elseif($active->stage == 'feedback')
    @include('trials.feedback')
@elseif($active->stage == 'evaluate')
    @include('trials.evaluate')
@elseif($active->stage == 'confirm')
    @include('trials.confirm')
@endif
