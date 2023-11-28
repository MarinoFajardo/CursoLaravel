@csrf
        <label for="Titulo">Título</label>
        <input type="text" class="form-control" name="title" value="{{old("title",$categorium->title)}}">

        <label for="Slug">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{old("slug",$categorium->slug)}}">

        <button class="btn btn-success mt-3" type="submit">Enviar</button>