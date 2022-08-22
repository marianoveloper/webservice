@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Modulo Curso</h1>
@stop
<div class="card">
    <div class="card-header">
        <center>
            <h3>Rellene correctamente el formulario</h3>
        </center>
    </div>
    <div class="card-body">
        <form action="{{route('admin.cursos.update',$curso->id)}}" method="POST" >
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$curso->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre del Curso corto</label>
                <input type="text" class="form-control" id="shortname" name="shortname"value="{{$curso->shortname}}">
                @error('shortname')
                <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Modificar Curso</button>
                <a href="{{route('admin.cursos.index')}}" class="btn btn-dark" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@section('content')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
