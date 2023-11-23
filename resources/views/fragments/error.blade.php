{{-- Mostrar si hay errores en el formulario --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="error">
        {{$error}}
    </div>
@endforeach   
@endif