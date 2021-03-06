@extends('layouts.app')

@section('content')
    <div>
        <p>
            Name: {{ $user->name }}
        </p>
        <p>
            Email: {{ $user->email }}
        </p>
        <div class="state-of-residence">
            <span>State-of-residence: {{ $user->state->name }}</span>
        </div>

        <p>
            Attended events:
            <ul>
                @forelse ($user->events as $event)
                    <li>{{ $event->name }}</li>
                @empty
                    <li>This user is not attending any events!</li>
                @endforelse
            </ul>
        </p>
    </div>
@endsection
