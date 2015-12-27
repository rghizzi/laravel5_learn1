@extends('app')

@section('content')
    <h1>Articles</h1>
    @if(!is_null($username))
    <h5>User: {{$username}} <a href="auth/logout">Logout</a></h5>
        @else
        <h5><a href="auth/login">Login</a> / <a href="auth/register">Register</a></h5>
    @endif
    <div class="nv-bullet"><a href="{{ action('ArticleController@create') }}">New Article</a></div>
    @foreach($articles as $article)
        <article>
            <h2>{{$article->title}} on {{$article->published_date->diffForHumans()}}</h2>
            <div class="body">{{$article->body}}</div>

            <a href="{{ action('ArticleController@show',[$article->id]) }}"> Read</a>
        </article>
    @endforeach


@stop