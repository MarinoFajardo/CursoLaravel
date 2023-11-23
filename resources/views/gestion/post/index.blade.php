@extends('gestion.layout')
@section('content')
    <table>
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
                Categoría
            </td>

            <td>
                {{$p->posted}}
            </td>

            <td>
                Acciones
            </td>
        </tr>
           @endforeach 
        </tbody>
    </table>

    {{-- Paginación de los posts --}}
    {{ $posts->links() }}
@endsection