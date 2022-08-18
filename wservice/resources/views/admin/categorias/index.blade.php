@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias de Moodle</h1>
@stop

@section('content')

@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="card"><div class="card-header"> <a Class="btn btn-primary" href="{{route('admin.categorias.create')}}" role="button">Crear Categoria</a> </div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre de la Categoria</th>
        <th scope="col" width="25%">Acciones</th>

      </tr>
    </thead>
    <tbody>
        @foreach(json_decode($categorias) as $item)
            <tr>
                <th> {{$item->name}}</th>
                <td>
                    <a class="btn btn-info" href="{{route('admin.categorias.edit',$item->id)}}" role="button">Editar</a>
                    <a class="btn btn-danger" href="{{route('admin.categorias.veliminar',$item->id)}}" role="button">Eliminar</a>
                </td>

            </tr>
            @endforeach
    </tbody>
  </table>
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
