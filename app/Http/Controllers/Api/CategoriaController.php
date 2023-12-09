<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\PutRequest;
use App\Http\Requests\Categoria\StoreRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categoria::paginate(10));
    }

    public function all()
    {
        return response()->json(Categoria::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Categoria::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categorium)
    {
        return response()->json($categorium);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Categoria $categorium)
    {
        $data = $request->validated();
        $categorium->update($data);
        return response()->json($categorium);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categorium)
    {
        $categorium->delete();
        return response()->json("Registro eliminado");
    }

    public function slug($slug)
    {
        $post = Categoria::where("slug",$slug)->firstOrFail();
        return response()->json($post);
    }
}
