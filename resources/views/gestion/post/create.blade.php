@extends('gestion.layout')

@section('content')
    <h1 class="title">Crear Post</h1>

    {{-- Incluir el fragmento de los errores --}}
    @include('fragments.error')

    {{-- Formulario para crear un post --}}
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @include('fragments._form')
    </form>
@endsection