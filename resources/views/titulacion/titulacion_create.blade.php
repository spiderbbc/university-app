@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("titulacion.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="nombre" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("titulacion.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
</div>
@stop