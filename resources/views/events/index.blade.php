@extends('layouts.app')

@section('content')

<h1>Events</h1>

{!! $events->links() !!}

{{-- <p>{{ $events->count() }} records selected</p> --}}
<ul>
    @forelse ($events as $event)
        <a href="{{ route('events.show', ['event' => $event->slug]) }}">
            <li>{{ $event->name }}</li>
        </a>
    @empty
        <li>No events found!</li>
    @endforelse
</ul>

<p>
    <a href="{{ route('events.create') }}">
        <button>Create a new event</button>
    </a>
</p>

@endsection
