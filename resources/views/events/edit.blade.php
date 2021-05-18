@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col" style="width: 500px">
            {!! Form::model($event,
                [
                    'method'    => 'put',
                    'route'     => ['events.update', $event->slug],
                    'class'     => 'form'
                ]
            ) !!}    <!-- a form opening tag -->

                <!-- an input name field -->
                <div class="form-group">
                    {!! Form::label('name', 'Event Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null,
                        ['class' => 'form-control' ])
                    !!}
                </div>

                <!-- an input city field -->
                <div class="form-group">
                    {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
                    {!! Form::text('city', null,
                        ['class' => 'form-control input-lg'])
                    !!}
                </div>

                <!-- an input street field -->
                <div class="form-group">
                    {!! Form::label('street', 'Street', ['class' => 'control-label']) !!}
                    {!! Form::text('street', null,
                        ['class' => 'form-control input-lg'])
                    !!}
                </div>

                <!-- an enabled checkbox field -->
                <div class="form-group">
                    {!! Form::label('enabled', 'Is enabled?', ['class' => 'control-label']) !!}
                    {!! Form::checkbox('enabled', true) !!}
                </div>

                <!-- an activated checkbox field -->
                <div class="form-group">
                    {!! Form::label('activated', 'Is activated?', ['class' => 'control-label']) !!}
                    {!! Form::checkbox('activated', true) !!}
                </div>


                <!-- a select max attendees field -->
                <div class="form-group">
                    {!! Form::label('max_attendees', 'Maximum Number of Attendees',
                        ['class' => 'control-label'])
                    !!}
                    {!! Form::select('max_attendees', [2 => '2', 3 => '3', 4 => '4', 5 => '5'], null,
                        ['class' => 'form-control input-lg'])
                    !!}
                </div>

                <!-- a description input field -->
                <div class="form-group">
                    {!! Form::label('description', "Description",
                        ['class' => 'control-label'])
                    !!}
                    {!! Form::textarea('description', null,
                        ['class' => 'form-control input-lg'])
                    !!}
                </div>

                <!-- a submit button -->
                <div class="form-group">
                    {!! Form::submit('Update Event',
                        [
                            'class' => 'btn btn-primary',
                            'style' => 'width: 100%'
                        ])
                    !!}
                </div>

            {!! Form::close() !!}       <!-- a form closing tag -->
        </div>
    </div>
@endsection
