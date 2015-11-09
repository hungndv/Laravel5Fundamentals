@extends('master')

@section('content')
    <h1>Articles</h1>

    @foreach($articles as $article)
        <article>
            <a href="/article/{{$article->id}}"><h2>{{ $article->title }}</h2></a>
            <a href="{{action('ArticleController@show', ['id' => $article->id])}}"><h2>{{ $article->title }}</h2></a>
            <a href="{{ url('/article', $article->id) }}"><h2>{{ $article->title }}</h2></a>
            <div class="body">{{ $article->body }}</div>
        </article>
    @endforeach
@stop