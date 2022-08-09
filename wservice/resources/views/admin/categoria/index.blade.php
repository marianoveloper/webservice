@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias de Moodle</h1>
@stop

@section('content')


<div class="card"><div class="card-header"> <a Class="btn btn-primary" href="#" role="button">Crear Categoria</a> </div>


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
                <td>Eliminar</td>

            </tr>
            @endforeach
    </tbody>
  </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
