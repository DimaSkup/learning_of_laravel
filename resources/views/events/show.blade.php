@extends('layouts.app')

@section('content')
    <h1>{{ $event->name }}</h1>

    <p>
        City: {{ $event->city }}<br/>
        Street: {{ $event->street }}
    </p>

    <h2>Description</h2>
    <p>
        {{ $event->description }}
    </p>

    <h2>Max attendees</h2>
    <p>
        {{ $event->max_attendees }}
    </p>

    @if ($event->occuringToday())
        <p>
            <b style="color:red">This event is occuring today!</b>
        </p>
    @endif


    {{ link_to_route('events.edit', 'Edit Event', ['event' => $event], [ 'class' => 'edit-button-container']) }}

    <div class="delete-button-container">
        <a href="{{ route('events.destroy', ['event' => $event->slug]) }}">
            <button style="color: red;">Delete the event</button>
        </a>
    </div>

@endsection
