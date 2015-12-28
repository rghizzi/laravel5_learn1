@extends('app')

@section('content')
    <h1>New Article</h1>

    {!! Form::open(['url'=>'articles']) !!}

    @include('articles.form',['submitButtonText' => 'Add New Article'])

    {!! Form::close()  !!}


    @include ('errors.list')

@stop