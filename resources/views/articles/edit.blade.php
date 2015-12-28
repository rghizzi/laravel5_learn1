@extends('app')

@section('content')
    <h1>Edit Article</h1>

    {!! Form::model($article,['method' => 'PATCH','action'=>['ArticleController@update',$article->id]]) !!}

    @include('articles.form',['submitButtonText' => 'Edit Article'])

    {!! Form::close()  !!}


    @include ('errors.list')

@stop