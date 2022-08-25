@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modulo Plantilla</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('admin.plantillas.create')}}" role="button">Crear Plantilla</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Largo</th>
                <th scope="col">Nombre Corto</th>
                <th scope="col">Acciones</th>

              </tr>
            </thead>
            <tbody>
                @foreach(json_decode($plantillas) as $item)
              <tr>
                <th scope="row">{{$item->name}}</th>
                <td>{{$item->shortname}}</td>
                <td>


                <form action="{{route('admin.plantillas.destroy',$item->id)}}" method="POST"></form>
                @csrf
                @method('delete')
                <a class="btn btn-success" href="{{route('admin.plantillas.asignar',$item->id)}}" role="button">Asignar</a>
                <a class="btn btn-info" href="{{route('admin.plantillas.edit',$item->id)}}" role="button">Editar</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
