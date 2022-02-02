@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("asignatura.update", [$asignatura])}}">
                @method("PUT")
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelect1" class="form-label mt-4">Titulacion</label>
                            <select class="form-select" value="{{$asignatura->titulacion_id}}" id="exampleSelect1" name="titulacion_id">
                                @foreach($titulaciones as $titulacion)
                                <option value="{{$titulacion->id}}">{{$titulacion->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <fieldset>
                                <label class="form-label mt-4" for="readOnlyInput">Curso Academico</label>
                                <input class="form-control" value="{{$asignatura->curso}}" id="readOnlyInput" name="curso" type="text" placeholder="Readonly input here..." readonly="">
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                                <label class="form-label mt-4">Nombre</label>
                                <input required autocomplete="off" name="nombre" class="form-control"
                                    type="text" value="{{$asignatura->nombre}}" placeholder="Nombre Asignatura">
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Creditos</label>
                            <input required autocomplete="off" name="creditos" class="form-control"
                                type="number" value="{{$asignatura->creditos}}" placeholder="Asigne numeros de creditos">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Alumnos máximos</label>
                            <input required autocomplete="off" name="alumnos_max" class="form-control"
                                type="number" value="{{$asignatura->alumnos_max}}" placeholder="Alumnos máximos">
                        </div>
                    </div>
                    <div class="col-md-12 py-5">
                        <div class="form-group">
                            <button class="btn btn-success m-1">Guardar</button>
                            <a class="btn btn-primary" href="{{route("asignatura.index")}}">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop