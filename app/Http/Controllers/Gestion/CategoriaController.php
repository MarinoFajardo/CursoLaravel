<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\PutRequest;
use App\Http\Requests\Categoria\StoreRequest;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $categorias = Categoria::paginate(7);
        return view('gestion.categoria.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $categorium = new Categoria();
        return view('gestion.categoria.create',compact('categorium'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request):RedirectResponse
    {
        $data = $request->validated();
        Categoria::create($data);
        return to_route('categoria.index')->with('status',"Registro creado.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categorium):View
    {
        return view('gestion.categoria.show',compact('categorium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categorium):View
    {
        return view('gestion.categoria.edit',compact('categorium'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Categoria $categorium):RedirectResponse
    {
        $data = $request->validated();
        $categorium->update($data);
        return to_route('categoria.index')->with('status',"Registro actualizado.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categorium):RedirectResponse
    {
        $categorium->delete();
        return to_route('categoria.index')->with('status',"Registro eliminado.");
    }
}
