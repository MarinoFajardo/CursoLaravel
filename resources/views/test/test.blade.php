@extends('layouts.master')

@section('content')
    <h1>Tu correo es: {{$user->email}}.</h1>

    {{-- Condicional --}}
    @if($user->name == "Marino")
        El nombre es correcto.
    @endif

    {{-- Bucles --}}
    @foreach( $array as $a)
    <div class="box item">
        <p>{{$a}}</p>
    </div>
    @endforeach

    <hr>

    @forelse ($array as $a)
    <div class="box item">
        <p>*{{$a}}</p>
    </div>
    @empty
    <p>No hay datos.</p>
    @endforelse

    {{-- Fragmentos de vista --}}
    @include("fragments.sub")
@endsection