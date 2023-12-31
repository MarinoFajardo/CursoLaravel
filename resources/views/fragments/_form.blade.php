@csrf
        <label for="Titulo">Título</label>
        <input type="text" class="form-control" name="title" value="{{old("title",$post->title)}}">

        <label for="Slug">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{old("slug",$post->slug)}}">

        <label for="Categoria">Categoría</label>
        <select name="categoria_id" class="form-control">
            <option value=""></option>
            @foreach ($categories as $title=>$id)
                <option {{old("categoria_id",$post->categoria_id) == $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>    
            @endforeach
        </select>

        <label for="Posted">Posted</label>
        <select name="posted" class="form-control">
            <option value=""></option>
            <option {{old("posted",$post->posted) == "yes" ? "selected" : ""}} value="yes">Sí</option>
            <option {{old("posted",$post->posted) == "not" ? "selected" : ""}} value="not">No</option>
            
        </select>


        <label for="Contenido">Contenido</label>
        <textarea  class="form-control" name="content">{{old("content",$post->content)}}</textarea>

        <label for="Descripcion">Descripción</label>
        <textarea class="form-control" name="description">{{old("description",$post->description)}}</textarea>

        <label for="Imagen">Imagen</label>
        <input type="file" name="image">

        <button class="btn btn-success mt-3" type="submit">Enviar</button>