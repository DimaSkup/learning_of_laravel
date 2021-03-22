@extends('layouts.app')

@section('content')
    <h1>Events</h1>

    <ul>
        @forelse ($events as $event)
            <li>{{ $event->name }}</li>
        @empty
            <li>No events found!</li>
        @endforelse
    </ul>

@endsection
