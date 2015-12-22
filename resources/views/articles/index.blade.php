@extends('app')

@section('content')
    <h1>Articles</h1>
    <div class="nv-bullet"><a href="{{ action('ArticleController@create') }}">New Article</a></div>
    @foreach($articles as $article)
        <article>
            <h2>{{$article->title}} on {{$article->published_date->diffForHumans()}}</h2>
            <div class="body">{{$article->body}}</div>

            <a href="{{ action('ArticleController@show',[$article->id]) }}"> Read</a>
        </article>
    @endforeach


@stop