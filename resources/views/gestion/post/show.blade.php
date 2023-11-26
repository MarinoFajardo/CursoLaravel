@extends('gestion.layout')

@section('content')
    <h1>{{$post->title}}</h1>

    <div>{{$post->image}}</div>

    <p>{{$post->posted}}</p>

    <p>{{$post->description}}</p>
    
    <div>{{$post->content}}</div>
    
@endsection