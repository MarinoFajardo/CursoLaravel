@extends('gestion.layout')

@section('content')
    <h1>Crear Post</h1>

    {{-- Incluir el fragmento de los errores --}}
    @include('fragments.error')

    {{-- Formulario para crear un post --}}
    <form action="{{route('post.store')}}" method="post">
        @include('fragments._form')
    </form>
@endsection