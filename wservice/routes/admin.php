<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PlantillaController;


Route::get('/', function () {
    return view('admin.index');
});

Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::get('categorias/{id}/veliminar',[CategoriaController::class,'veliminar'])->name('categorias.veliminar');

Route::resource('cursos', CursoController::class)->names('cursos');
Route::resource('plantillas', PlantillaController::class)->names('plantillas');
Route::get('plantillas/{id}/asignar',[PlantillaController::class,'asignar'])->name('plantillas.asignar');
Route::post('plantillas/agregarcurso',[PlantillaController::class,'agregarcurso'])->name('plantillas.agregarcurso');
Route::post('plantillas/eliminarcurso',[PlantillaController::class,'eliminarcurso'])->name('plantillas.eliminarcurso');
