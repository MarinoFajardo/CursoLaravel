<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::paginate(10));
    }

    public function all()
    {
        return response()->json(Post::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("Registro eliminado");
    }

    /**
     * Función para obtener los post pertenecientes a una categoria
     */
    public function posts(Categoria $categorium){
        // $posts = Post::join('categorias',"categorias.id","=","posts.categoria_id")
        // ->select("posts.*", "categorias.title as categoria")
        // ->where("categorias.id",$categorium->id)
        // ->get();

        $posts = Post::with("categoria")
        ->where("categoria_id",$categorium->id)
        ->get();
        return response()->json($posts);
    }

    /**
     * Función para obtener los post por el slug
     */
    public function slug($slug)
    {
        $post = Post::with("categoria")
        ->where("slug",$slug)->firstOrFail();
        return response()->json($post);
    }
}
