@extends('questions/layout')

@section('content')

    @include('common/errors')

    <form action="{{ action('QuestionController@store', ['id' => $question->id]) }}" method="post">

        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
            @if($errors->has('title'))
                THIS FIELD HAS ERRORS:
            @endif
            {!! Form::label('title', 'Title of the question', ['class' => 'control-label']) !!}        
            {!! Form::text('title', $question->title, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Text', ['class' => 'control-label']) !!}        
            {!! Form::textarea('text', $question->text, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

    </form>

@endsection