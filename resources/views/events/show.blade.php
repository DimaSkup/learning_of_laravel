@extends('layouts.app')

@section('content')

<a href="{{ route('events.index') }}">Back to all events</a>

<div class="event-show-content">
    <h1>{{ $event->name }} with id:{{ $event->id }}</h1>

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

    <h3>Related users:</h3>
    <ul>
        @forelse ($relatedUsers as $relatedUser)
            <li>
                {{ $relatedUser->name }} left a comment:
            </li>
        @empty
            There in no related user
        @endforelse
    </ul>


    <div>
        IS event ENABLED?
        {{ $event->enabled }}
    </div>

    <div>
        <h3>Comments</h3>
            @foreach ($event->comments as $comment)
                <p>
                    {{ $comment->body }}
                </p>
            @endforeach
    </div>


    <div class="event-show-content-buttons">
        <!-- This is a link to the event edit form -->
        {{ link_to_route('events.edit', 'Edit Event', ['event' => $event], [ 'class' => 'edit-button-container']) }}


        <!-- This is a link to the event delete  -->
        {!! Form::open(
                 [
                     'route' => ['events.destroy', $event],
                     'method' => 'delete'
                 ]
             ) !!}
        {!! Form::submit('Delete Event', ['class' => 'btn btn-delete-event']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection
