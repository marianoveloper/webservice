@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Eliminar Categorias de Moodle</h1>
@stop

@section('content')

@php
   foreach(json_decode($ecategoria) as $cat) {

    }
@endphp

<div class="card"><div class="card-header">Editar tu Categoria </div>
<div class="card-body">
    <form action="{{route('admin.categorias.update',$cat->id)}}" method="POST">
        @csrf
        @method('put')
        <input name="id" id="id" type="hidden" value="{{$cat->id}}">
        <div class="mb-3">
            <label for="scategoria" class="form-label"></label>
            <select class="form-select" aria-label="Default select example" id="scategoria" name="scategoria">
                @if($cat->parent==0)
                    <option value="0" selected>Superior</option>
                @else
                <option value="0">Superior</option>
                @endif
                @foreach(json_decode($categorias) as $item)
                        @if($item->id == $cat->parent)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$cat->name}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idnumber" class="form-label">idnumber</label>
            <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{$cat->idnumber}}">
            @error('idnumber')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea class="form-control" id="description" rows="3" name="description" >{{$cat->description}}</textarea>
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-danger">Eliminar Categoria</button>
            <a class="btn btn-dark" href="{{route('admin.categorias.index')}}" role="button">Cancelar</a>
        </div>
    </form>
</div>

</div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
