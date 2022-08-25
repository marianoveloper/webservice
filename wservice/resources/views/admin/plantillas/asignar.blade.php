@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar Curso a la Plantilla</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <center>
            <h3>Rellene correctamente el formulario</h3>
        </center>
            <h5>Nombre de la PLantilla: {{$plantilla->name}}</h5>
            <h5>Nombre corto de la PLantilla: {{$plantilla->shortname}}</h5>

    </div>
    @if($cursos->count() != $plantilla->cursos->count())
    <div class="card-body">
        <form action="{{route('admin.plantillas.agregarcurso')}}" method="POST" >
            @csrf
            <input name="plantilla_id" id="plantilla_id" type="hidden" value="{{$plantilla->id}}">
            <div class="mb-3">
                <label for="scategoria" class="form-label"></label>
                <select class="form-select" aria-label="Default select example" id="curso_id" name="curso_id">

                    @foreach($cursos as $curso)

                    @php
                        $serepite = false;
                    @endphp

                        @foreach($plantilla->cursos as $acursos)

                            @php
                                if($acursos->id==$curso->id){
                                    $serepite=true;
                                }
                            @endphp

                        @endforeach
                        @if($serepite==false)
                            <option value="{{$curso->id}}">{{$curso->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Agregar Curso</button>
                <a href="{{route('admin.plantillas.index')}}" class="btn btn-dark" role="button">Cancelar</a>
            </div>
        </form>
    </div>
    @else
    <div class="mb-3">
        <strong>No hay cursos que agregar</strong>
    </div>
    @endif

</div>
<hr>

<div class="card">


    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Largo</th>
                <th scope="col">Nombre Corto</th>
                <th>Acción</th>

              </tr>
            </thead>
            <tbody>
                @foreach($plantilla->cursos as $curso)
              <tr>
                <th scope="row">{{$curso->name}}</th>
                <td>{{$curso->shortname}}</td>
                <td>
                    <a href="#" class="btn btn-danger" onclick="document.getElementById('form2-{{$curso->id}}').submit()" role="button">Eliminar</a>
                </td>
                    <form action="{{route('admin.plantillas.eliminarcurso')}}" method="POST" id="form2-{{$curso->id}}">
                        @csrf
                        <input name="plantilla_id" id="plantilla_id" type="hidden" value="{{$plantilla->id}}">
                        <input name="curso_id" id="curso_id" type="hidden" value="{{$curso->id}}">
                    </form>
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
