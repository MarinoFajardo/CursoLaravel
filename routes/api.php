<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::resource('categoria',CategoriaController::class)->except(["create","edit"]);
    Route::resource('post',PostController::class)->except(["create","edit"]);
});

Route::get('post/all',[PostController::class,'all']);
Route::get('post/slug/{slug}',[PostController::class,'slug']);
Route::get('categoria/all',[CategoriaController::class,'all']);
Route::get('categoria/{categorium}/post',[PostController::class,'posts']);
Route::get('categoria/slug/{slug}',[CategoriaController::class,'slug']);

