@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Categorias de Moodle</h1>
@stop

@section('content')

<div class="card"><div class="card-header">Bienvenido
 </div>
<div class="card-body">
    <form action="{{route('admin.categorias.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="scategoria" class="form-label"></label>
            <select class="form-select" aria-label="Default select example" id="scategoria" name="scategoria">
                <option selected>Open this select menu</option>
                <option value="0">Superior</option>
                @foreach(json_decode($categorias) as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idnumber" class="form-label">idnumber</label>
            <input type="text" class="form-control" id="idnumber" name="idnumber">
            @error('idnumber')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Crear Categoria</button>
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
