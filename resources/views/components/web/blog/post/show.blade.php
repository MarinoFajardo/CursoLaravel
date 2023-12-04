<div {{$attributes->merge(['class' => 'card-red'])}}>
    {{$changeTitle()}}
    <h1 class="title">{{$post->title}}</h1>
    <p>{{$post->created_at}}</p>
    <p>{{$post->content}}</p> 
</div>