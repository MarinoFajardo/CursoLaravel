<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::with('categoria')->paginate(10));
    }

    public function all()
    {
        /**
         * 1. Comprobar caché
         * 2. Caché existe, devolver caché.
         * 3. Caché no existe, consulta BD - caché y retornar.
         */

        /*
        if(Cache::has('post_all')){
            return response()->json(Cache::get('post_all'));
        }else{
            $posts =  response()->json(Post::get());
            Cache::put('post_all',$posts);
            return response()->json($posts);

        }
        */

        /////------ Segundo Método ---------///////
        return response()->json(Cache::remember('post_all2',now()->addMinutes(10),function(){
            return Post::all();
        }));
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

    public function upload(Request $request, Post $post)
    {
        $request->validate([
            'image' => "required|mimes:jpeg,png,gif|max:10240"
        ]);

        $data["image"] = $filename = time().".".$request["image"]->extension();
        $request->image->move(public_path("image/otro"),$filename);
        $post->update($data);
        return response()->json("Registro Actualizado");
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
