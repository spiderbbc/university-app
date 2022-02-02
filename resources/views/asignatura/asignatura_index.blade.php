@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route("asignatura.create")}}" class="btn btn-success mb-2">Agregar</a>
        @include("layouts.notificacion")
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>

                <th>Editar</th>
                <th>Eliminar</th></tr>
            </thead>
            <tbody>
            @foreach($asignaturas as $asignatura)
                <tr>
                    <td>{{$asignatura->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route("asignatura.edit",[$asignatura])}}">
                            edit
                        </a>
                    </td>
                    <td>
                        <form action="{{route("asignatura.destroy", [$asignatura])}}" method="post">
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