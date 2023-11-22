<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Post</title>
</head>
<body>

    <h1>Crear Post</h1>

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

</body>
</html>