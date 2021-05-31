@extends('layouts.app')

@section('content')
    <ul>
        @forelse ($users as $user)
            <li>
                <a href="{{ route('users.show', ['user' => $user->id]) }}">
                    {{ $user->name }}
                </a>
            </li>
        @empty
            There are no users
        @endforelse
    </ul>
@endsection
