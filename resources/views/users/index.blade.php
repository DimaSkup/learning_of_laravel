@extends('layouts.app')

@section('content')
    <!-- sort users by ids button -->
    <div>
        <a href="{{ route('users.index', ['sort_by' => 'id']) }}">Sort by ids</a>
    </div>
    <!-- sort users by names button -->
    <div>
        <a href="{{ route('users.index', ['sort_by' => 'name']) }}">Sort users by names</a>
    </div>

    <ul>
        @forelse ($users as $user)
            <li>
                <a href="{{ route('users.show', ['user' => $user->id]) }}">
                    {{ $user->name }}
                </a>
                <span>(id = {{ $user->id }})</span>
            </li>
        @empty
            There are no users
        @endforelse
    </ul>
@endsection
