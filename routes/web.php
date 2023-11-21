<?php

use Illuminate\Support\Facades\Route;
//Para referenciar otras clases hay que añadir su namespace.
use App\Http\Controllers\Gestion\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Ruta a la que se accede cuando se carga la página principal.
http://example-app.test/
*/
Route::get('/', function () {
    return view('welcome');
});

/**
 * Rutas para el controlador de gestión.
 */
Route::resource('post', PostController::class);

/*
Haciendo la ruta anterior no es necesario añadir todo esto pero se puede 
hacer de las dos formas aunque la primera es más cómoda.
//Ruta para la función index del controlador.
Route::get('post',[PostController::class,'index']);
//Ruta para la función show del controador.
Route::get('post/{post}',[PostController::class,'show']);
//Ruta para la función create del controador.
Route::get('post/create',[PostController::class,'create']);
//Ruta para la función edit del controador.
Route::get('post/{post}/edit',[PostController::class,'edit']);
//Ruta para la función store del controlador.
Route::post('post',[PostController::class,'store']);
//Ruta para la función update del controlador.
Route::put('post/{post}',[PostController::class,'update']);
//Ruta para la función destroy del controlador.
Route::delete('post/{post}',[PostController::class,'delete']);
*/