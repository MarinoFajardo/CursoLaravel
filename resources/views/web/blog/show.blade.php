@extends('web.layout')

@section('content')
    <x-web.blog.post.show :post="$post" class="card"/>
    
@endsection