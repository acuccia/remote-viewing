<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                <h4>Experiment Complete!</h4>
            </div>
            <div class="panel-body">

                <h4 class="text-center">Target</h4>

                <div class="well">
                    The target cannot be revealed until the experiment is closed,
                    which will be {{ $expiration->diffForHumans() }}
                </div>

                <h4 class="text-center">
                    Here are your choices. When the experiment is closed, you will
                    see if they are correct.
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
                                <td class="alert-warning text-center">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>

                <div class="text-center">
                    <a href="/home" class="btn btn-primary">Refresh</a>
                </div>
            </div>
        </div>
    </div>
</div>



