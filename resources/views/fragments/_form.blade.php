@csrf
        <label for="Titulo">Título</label>
        <input type="text" name="title" value="{{old("title",$post->title)}}">

        <label for="Slug">Slug</label>
        <input type="text" name="slug" value="{{old("slug",$post->slug)}}">

        <label for="Categoria">Categoría</label>
        <select name="categoria_id">
            <option value=""></option>
            @foreach ($categories as $title=>$id)
                <option {{old("categoria_id",$post->categoria_id) == $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>    
            @endforeach
        </select>

        <label for="Posted">Posted</label>
        <select name="posted">
            <option value=""></option>
            <option {{old("posted",$post->posted) == "yes" ? "selected" : ""}} value="yes">Sí</option>
            <option {{old("posted",$post->posted) == "not" ? "selected" : ""}} value="not">No</option>
            
        </select>


        <label for="Contenido">Contenido</label>
        <textarea name="content">{{old("content",$post->content)}}</textarea>

        <label for="Descripcion">Descripción</label>
        <textarea name="description">{{old("description",$post->description)}}</textarea>

        <button type="submit">Enviar</button>