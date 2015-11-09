@extends('master')

@section('content')
    <h2>Create an article</h2>

    {!! Form::model($article = new \hello\Article(), ['url'=>'article']) !!}
{{--    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published_at', 'published_at:') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => '']) !!}
    </div>--}}
    @include('article.form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}

    {{--{{var_dump($errors)}}--}}
    @include('errors.list')
@stop