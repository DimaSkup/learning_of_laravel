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

    <!-- favourited events created by users residing in this state -->
    <div>
        Favorited events created by users which are residing in this state:
        {{ dump($state->favorites) }}
        <ul>
           {{--
           @foreach($state->favorites as $favorite)
                <li>
                    {{ $favorite->name }}
                </li>
            @endforeach
            --}}
        </ul>
    </div>
</div>
@endsection
