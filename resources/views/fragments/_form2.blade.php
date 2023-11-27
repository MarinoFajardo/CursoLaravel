@csrf
        <label for="Titulo">Título</label>
        <input type="text" name="title" value="{{old("title",$categorium->title)}}">

        <label for="Slug">Slug</label>
        <input type="text" name="slug" value="{{old("slug",$categorium->slug)}}">

        <button type="submit">Enviar</button>