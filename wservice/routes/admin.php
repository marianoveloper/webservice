<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\CategoriaController;


Route::get('/', function () {
    return view('admin.index');
});

Route::resource('categorias', CategoriaController::class)->names('categorias');
Route::get('categorias/{id}/veliminar',[CategoriaController::class,'veliminar'])->name('categorias.veliminar');

Route::resource('cursos', CursoController::class)->names('cursos');
