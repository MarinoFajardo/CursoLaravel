@extends('gestion.layout')

@section('content')
    <h1 class="title">Editar Post: {{$post->title}}</h1>

    {{-- Incluir el fragmento de los errores --}}
    @include('fragments.error')

    {{-- Formulario para crear un post --}}
    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @method("PUT")
        @include('fragments._form')
    </form>
@endsection