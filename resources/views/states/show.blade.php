@extends('layouts.app')

@section('content')
<div>
    <!-- A state name -->
    <div>
        <span>State: <span>{{ $state->name }}
    </div>
    <!-- A state abbreviation -->
    <div>
        <span>Abbreviation: </span> {{ $state->abbreviation }}
    </div>
    <!-- Events which are related to this state -->
    <div>
        <span>Related events list:</span>
        <ul>
            @forelse ($events as $event)
                <li>{{ $event->name }}</li>
            @empty
                <span>There is no events</span>
            @endforelse
        </ul>
    </div>
</div>
@endsection
