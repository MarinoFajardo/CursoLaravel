@extends('gestion.layout')

@section('content')
    <h1>Crear Post</h1>

    {{-- Incluir el fragmento de los errores --}}
    @include('fragments.error')

    {{-- Formulario para crear un post --}}
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <label for="Titulo">Título</label>
        <input type="text" name="title">

        <label for="Slug">Slug</label>
        <input type="text" name="slug">

        <label for="Categoria">Categoría</label>
        <select name="categoria_id">
            <option value=""></option>
            @foreach ($categories as $title=>$id)
                <option value="{{$id}}">{{$title}}</option>    
            @endforeach
        </select>

        <label for="Posted">Posted</label>
        <select name="posted">
            <option value=""></option>
            <option value="yes">Sí</option>
            <option value="not" selected>No</option>
            
        </select>


        <label for="Contenido">Contenido</label>
        <textarea name="content"></textarea>

        <label for="Descripcion">Descripción</label>
        <textarea name="description"></textarea>

        <button type="submit">Enviar</button>
    </form>
@endsection