<?php

use Illuminate\Support\Facades\Route;

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

/* Ruta con nombre.
http://example-app.test/contacto
*/
Route::get('/contacto', function () {
    return view("contacto");
})->name("contacto");


/*Ruta con paso de variables.
http://example-app.test/custom
*/
Route::get('/custom', function () {
    $msj = "Mensaje desde el servidor *-*";
    return view("custom",['msj' => $msj]);
});