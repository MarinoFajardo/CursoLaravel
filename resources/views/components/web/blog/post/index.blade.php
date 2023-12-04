<div>
    {{$slot}}
    {{$header}}
    @foreach ($posts as $p)
        <div class="card card-white">
            <h3>{{$p->title}}</h3>
            <p>{{$p->description}}</p>
            <a class="btn btn-primary my-2" href="{{route("web.blog.show",$p)}}">Ver</a>
        </div>
    @endforeach

    {{$extra}}

    {{$posts->links()}}

    {{$footer}}
</div>