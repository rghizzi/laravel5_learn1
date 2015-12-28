@extends('app')

@section('content')
    <h1>Articles
<a href="{{ action('ArticleController@create') }}" class="btn btn-sm btn-primary">New Article</a>
    </h1>
    @foreach($articles as $article)
        <article>
            <h2>{{$article->title}} on {{$article->published_date->diffForHumans()}}</h2>
            <div class="body">{{$article->body}}</div>

            <a href="{{ action('ArticleController@show',[$article->id]) }}"> Read</a>
        </article>
    @endforeach


@stop