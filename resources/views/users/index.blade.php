@extends('app')

@section('content')

    <h1 class="text-center">Registered Users</h1>

    <table class="table">
        <tr class="row">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Trials</th>
            <th>Stats (chance/actual)</th>
        </tr>

        @foreach($users as $user)

            @if ($user->is_admin)
                <tr class="row success">
            @else
                <tr class="row">

            @endif
                    <td>
                        {{ $user->id }}
                        {{--{!! link_to("users/$user->id/edit", 'Edit', ['class' => 'btn btn-primary']) !!}--}}
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->trials as $trial)

                            @if ($trial->complete)
                                <span class="trial-list">
                                 <a href="trials/{{ $trial->id }}">{{ $trial->experiment->id }}</a>
                                </span>
                            @endif

                        @endforeach
                    </td>
                    <td>
                        @if ($user->trials()->whereComplete(true)->count() > 0)
                            {{ number_format($user->expectedPercentage(), 1) }}% /
                            {{ number_format($user->actualPercentage(), 1) }}%
                        @else
                            N/A
                        @endif
                    </td>
                </tr>

        @endforeach

    </table>

@stop
