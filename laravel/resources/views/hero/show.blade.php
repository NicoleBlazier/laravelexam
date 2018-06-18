@extends('layouts.app')

@section('content')


{{ $option->text }}
<form action="{{ action('HeroController@store', [$id]) }}" method="post">     
{{ csrf_field() }}

    <div class="form-group">
        {{ Form::text($subject, 'subject'}}
        {{ Form::text($description, 'description'}}
    </div>

    <div class="form-group prl-5">
        {!! Form::submit('Save') !!}
    </div>

@endsection