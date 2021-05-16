@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col" style="width: 500px">
            {!! Form::open(['route' => 'events.store'], ['class' => 'form']) !!}    <!-- a form opening tag -->

                <!-- an input name field -->
                <div class="form-group">
                    {!! Form::label('name', 'Event Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null,
                        [
                            'class'         => 'form-control input-lg',
                            'placeholder'   => 'PHP Hacking and Pizza'
                        ])
                    !!}
                </div>

                <!-- a select max attendees field -->
                <div class="form-group">
                    {!! Form::label('max_attendees', 'Maximum Number of Attendees',
                        ['class' => 'control-label'])
                    !!}
                    {!! Form::select('max_attendees', [2,3,4,5], null,
                        [
                            'class' => 'form-control input-lg',
                            'placeholder' => 'Maximum Number of Attendees',
                        ])
                    !!}
                </div>

                <!-- a description input field -->
                <div class="form-group">
                    {!! Form::label('description', "Description",
                        ['class' => 'control-label'])
                    !!}
                    {!! Form::textarea('description', null,
                        [
                            'class' => 'form-control input-lg',
                            'placeholder' => 'Describe the event'
                        ])
                    !!}
                </div>

                <!-- a submit button -->
                <div class="form-group">
                    {!! Form::submit('Add Event',
                        [
                            'class' => 'btn btn-info btn-lg',
                            'style' => 'width: 100%'
                        ])
                    !!}
                </div>

            {!! Form::close() !!}       <!-- a form closing tag -->
        </div>
    </div>
@endsection
