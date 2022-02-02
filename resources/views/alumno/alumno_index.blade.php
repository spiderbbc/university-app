@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route("alumno.create")}}" class="btn btn-success mb-2">Agregar</a>
        @include("layouts.notificacion")
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>

                <th>Calificaciones</th>
                <th>Eliminar</th></tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->nombres}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route("calificaciones.edit",[$alumno])}}">
                            calificaciones
                        </a>
                    </td>
                    <td>
                        <form action="{{route("alumno.destroy", [$alumno])}}" method="post">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div

@stop