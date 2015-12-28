@extends('app')

@section('content')
    <h1>Single Article</h1>

        <article>
            <h2>{{$article->title}} {!! link_to_route('articles.edit','Edit',$article->id,['class' => 'btn btn-sm btn-primary']) !!}</h2>


            <div class="body">{{$article->body}}</div>

            @unless($article->tags->isEmpty())
            <h5>Tags</h5>
            <ul>
                @foreach($article->tags as $tag)
                    <li>{{$tag->name}}</li>
                    @endforeach
            </ul>
                @endunless
        </article>

@stop