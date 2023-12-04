@extends('web.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado Principal de Post</h1>

        @slot('header')
            <h1>Listado Principal de Post --Header</h1>
        @endslot

        @slot('footer')
            <footer>
                Pie de página
            </footer>
        @endslot

        @slot('extra')
            Extra
        @endslot

    </x-web.blog.post.index>
@endsection