@extends('app')

@section('content')

    <h1 class="text-center">Registered Users</h1>

    <table class="table">
        <tr class="row">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>

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
                </tr>

        @endforeach

    </table>

@stop
