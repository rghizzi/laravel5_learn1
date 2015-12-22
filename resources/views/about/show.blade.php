@extends('app')

@section('content')
<h1>HELLO</h1>
<p>
    this is a test page
</p>

    @if(count($persons))

    <ul>
    @foreach($persons as $singleperson)
       <li>{{$singleperson}}</li>
    @endforeach
    </ul>

    @endif

@stop