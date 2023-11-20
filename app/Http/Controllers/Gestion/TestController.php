<?php

namespace App\Http\Controllers\Gestion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/*
Controlador para realizar operaciones CRUD en la parte de gestion.
*/

class TestController extends Controller
{

    /**
     * 
     * 
     */
    function test()
    {
        // Mostrar la info del usuario con id=1.
        $user = User::find(1);
        return view('test',['user' => $user, 'array' => [1,2,3,4,'Marino']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
