@extends('master')

@section('content')
    <h2>Edit: {!! $article->title !!}</h2>

    {{--{!! Form::open(['method' => 'PATCH', 'url'=>'article/'.$article->id]) !!}--}}
    {{--{!! Form::open(['method' => 'PATCH', 'route'=>'article/'.$article->id]) !!}--}}
    {!! Form::model($article, ['method' => 'PATCH', 'action'=> ['ArticleController@update', $article->id]]) !!}
{{--    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published_at', 'Published at:') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control', 'foo' => 'bar']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit(['Update Article'], ['class' => '']) !!}
    </div>--}}
    @include('article.form', ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}

    {{--{{var_dump($errors)}}--}}
    @include('errors.list')
@stop