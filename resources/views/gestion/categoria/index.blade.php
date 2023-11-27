@extends('gestion.layout')
@section('content')

    {{-- Acción de crear un post --}}
    <a href="{{ route("categoria.create") }}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>
                    Título
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
                <a href="{{ route("categoria.edit",$c) }}">Editar</a>
                <a href="{{ route("categoria.show",$c) }}">Ver</a>
                <form action="{{route("categoria.destroy",$c)}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
           @endforeach 
        </tbody>
    </table>

    {{-- Paginación de los posts. No funciona si no se usa paginate--}}
    {{ $categorias->links() }}
@endsection