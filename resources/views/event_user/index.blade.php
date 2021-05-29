@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col" style="width: 500px;">
            {!! Form::open(['route' => 'event_user.store'], ['class' => 'form']) !!}
                <!-- a choose user field -->
                <div class="form-group">
                    {!! Form::label('choose_user', 'Choose a user', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id',
                                     \App\User::orderBy('name', 'ASC')->pluck('name', 'id'),
                                     null,
                                     ['class' => 'form-control input-lg']
                    ); !!}
                </div>

                <!-- a choose event field -->
                <div class="form-group">
                    {!! Form::label('choose_event', 'Choose an event', ['class' => 'control-label']) !!}
                    {!! Form::select('event_id',
                                     \App\Event::orderBy('name', 'ASC')->pluck('name', 'id'),
                                     null,
                                     ['class' => 'font-control input-lg']
                    ); !!}
                </div>


                <!-- a submit button -->
                <div class="form-group">
                    {!! Form::submit('Add Relation',
                        [
                            'class' => 'btn btn-info btn-lg',
                            'style' => 'width: 100%'
                        ])
                    !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
