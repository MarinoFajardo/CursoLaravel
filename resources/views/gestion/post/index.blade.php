@extends('gestion.layout')
@section('content')

    {{-- Acción de crear un post --}}
    <a class="btn btn-success my-3" href="{{ route("post.create") }}">Crear</a>
    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Título
                </th>
    
                <th>
                    Categoría
                </th>
    
                <th>
                    Posted
                </td>
    
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
           @foreach ($posts as $p)
           <tr>
            <td>
                {{$p->title}}
            </td>

            <td>
                {{$p->categoria->title}}
            </td>

            <td>
                {{$p->posted}}
            </td>

            <td>
                <a class="btn btn-primary my-2" href="{{ route("post.edit",$p) }}">Editar</a>
                <a class="btn btn-primary my-2" href="{{ route("post.show",$p) }}">Ver</a>
                <form action="{{route("post.destroy",$p)}}" method="POST">
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
    {{ $posts->links() }}
@endsection