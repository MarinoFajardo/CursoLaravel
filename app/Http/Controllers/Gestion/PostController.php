<?php

namespace App\Http\Controllers\Gestion;

use App\Models\Post;
use App\Models\Categoria;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $posts = Post::paginate(7);
        return view('gestion.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $categories = Categoria::pluck('id','title');
        $post = new Post();
        return view('gestion.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request):RedirectResponse
    {
        $data = $request->validated();
        $data["image"] = $filename = time().".".$data["image"]->extension();
        $request->image->move(public_path("image"),$filename);
        Post::create($data);
        return to_route('post.index')->with('status',"Registro creado.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): string|View
    {
        /**
         * Mantener los post en caché
         */

        if(Cache::has('post_show_'.$post->id)){
            return Cache::get('post_show_'.$post->id);
        }else{
            $cacheView = view('gestion.post.show',compact('post'))->render();
            Cache::put('post_show_'.$post->id,$cacheView);
            return $cacheView;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post):View
    {
        $categories = Categoria::pluck('id','title');
        return view('gestion.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post):RedirectResponse
    {
        $data = $request->validated();
        $data["image"] = $filename = time().".".$data["image"]->extension();
        $request->image->move(public_path("image"),$filename);
        $post->update($data);
        return to_route('post.index')->with('status',"Registro actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post):RedirectResponse
    {
        $post->delete();
        return to_route('post.index')->with('status',"Registro eliminado.");
    }
}
