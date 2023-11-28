@extends('gestion.layout')
@section('content')

    {{-- Acción de crear un post --}}
    <a class="btn btn-success my-3" href="{{ route("categoria.create") }}">Crear</a>
    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Título
                </th>
                <th>
                    Acciones
                </th>
    
            </tr>
        </thead>
        <tbody>
           @foreach ($categorias as $c)
           <tr>
            <td>
                {{$c->title}}
            </td>

            <td>
                <a class="btn btn-primary my-2" href="{{ route("categoria.edit",$c) }}">Editar</a>
                <a class="btn btn-primary my-2" href="{{ route("categoria.show",$c) }}">Ver</a>
                <form action="{{route("categoria.destroy",$c)}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
           @endforeach 
        </tbody>
    </table>

    {{-- Paginación de los posts. No funciona si no se usa paginate--}}
    {{ $categorias->links() }}
@endsection