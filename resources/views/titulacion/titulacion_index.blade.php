@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{route("titulacion.create")}}" class="btn btn-success mb-2">Agregar</a>
        @include("layouts.notificacion")
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>

                <th>Editar</th>
                <th>Eliminar</th></tr>
            </thead>
            <tbody>
            @foreach($titulaciones as $titulacion)
                <tr>
                    <td>{{$titulacion->nombre}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route("titulacion.edit",[$titulacion])}}">
                            edit
                        </a>
                    </td>
                    <td>
                        <form action="{{route("titulacion.destroy", [$titulacion])}}" method="post">
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