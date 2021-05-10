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
@endsection
