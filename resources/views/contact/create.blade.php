@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'contact.store', 'class' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Your name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail Address') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
        </div>

        <input type="hidden" name="recaptcha" id="recaptcha">

    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

@endsection
