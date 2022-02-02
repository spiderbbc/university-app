@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{route("alumno.store")}}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Nombres</label>
                            <input required autocomplete="off" name="nombres" class="form-control"
                                type="text" placeholder="Nombres del alumno" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Apellidos</label>
                            <input required autocomplete="off" name="apellidos" class="form-control"
                                type="text" placeholder="Apellidos del alumno" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Año de nacimiento</label>
                            <input class="form-control" name="año_nacimiento" type="number" min="1900" max="2099" step="1" value="" required/>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="select2Multiple">Asignaturas</label>
                            <select class="select2-multiple form-control" name="asignaturas[]" multiple="multiple"
                                id="select2Multiple">
                                @foreach($asignaturas as $index => $asignatura)
                                    <option value="{{$asignatura['id']}}">{{$asignatura['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 py-5">
                        <div class="form-group">
                            <button class="btn btn-success m-1">Guardar</button>
                            <a class="btn btn-primary" href="{{route("alumno.index")}}">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

</script>

@stop