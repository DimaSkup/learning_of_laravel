@extends('layouts.app')

@section('content')

<h1>LIST OF ALL THE STATES</h1>
<div>
    <ul>
        @forelse ($allStates as $state)
            <a href="{{ route('states.show', ['state' => $state->id]) }}">
                <li>{{ $state->name}} ({{ ($state->abbreviation) }})</li>
            </a>
        @empty
            <h2 style="color: red">There is no state</h2>
        @endforelse
    </ul>
</div>

@endsection
