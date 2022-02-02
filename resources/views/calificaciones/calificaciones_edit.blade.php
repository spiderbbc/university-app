@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombres</th>

                <th>Apellidos</th>
                <th>Año de nacimiento</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$alumno->nombres}}</td>
                    <td>{{$alumno->apellidos}}</td>
                    <td>{{$alumno->año_nacimiento}}</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    
    <form method="POST" action="{{route("calificaciones.store",['id' => $alumno->id])}}">
    @csrf
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Asignaturas</th>
            <th scope="col">Primera Convocatoria</th>
            <th scope="col">Segunda Convocatoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumno->matricula->asignaturas as $asignatura)
                <tr>
                    <th scope="row">
                        <p>{{$asignatura->nombre}}</p>
                    </th>
                    <td>
                        <input class="" name="{{$asignatura->id}}[]" type="number" min="0" max="20" step="1" value="" placeholder="0-20"/>
                        <input class="" name="{{$asignatura->id}}[]" type="number" min="0" max="20" step="1" value="" placeholder="0-20"/>
                    </td>
                    <td>
                        <input class="" name="{{$asignatura->id}}[]" type="number" min="0" max="20" step="1" value="" placeholder="0-20"/>
                        <input class="" name="{{$asignatura->id}}[]" type="number" min="0" max="20" step="1" value="" placeholder="0-20"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <div class="col-md-12 py-5">
            <div class="form-group">
                <button class="btn btn-success m-1">Guardar</button>
                <a class="btn btn-primary" href="{{route("alumno.index")}}">Volver al listado</a>
            </div>
        </div>
        </form>
</div>
@stop