<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>