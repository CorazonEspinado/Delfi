@extends('admins.layouts.template')

@section('sadalaform')

    {!! Form::open(['action'=>'AdminSadalaController@store', 'method'=>'POST']) !!}

    <div class="form-group">
        {{Form::label('title', 'Название раздела')}}
        {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'раздел'])}}
    </div>
    
    {{Form::submit('OK', ['class'=>'btn btn-primary', 'title'=>'OK'])}}

    {!! Form::close() !!}

    @endsection