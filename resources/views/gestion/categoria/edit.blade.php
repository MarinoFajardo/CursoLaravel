@extends('gestion.layout')

@section('content')
    <h1 class="title">Editar Categoria: {{$categorium->title}}</h1>

    {{-- Incluir el fragmento de los errores --}}
    @include('fragments.error')

    {{-- Formulario para crear un post --}}
    <form action="{{route('categoria.update',$categorium->id)}}" method="post">
        @method("PUT")
        @include('fragments._form2')
    </form>
@endsection