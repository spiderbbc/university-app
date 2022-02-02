<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Alumno;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $alumno = Alumno::find($id);
        
        $requestCalificaciones = $request->input();
        
        unset($requestCalificaciones['_token']);
        unset($requestCalificaciones['id']);
        
        //delete previus calificaciones
        $calificaciones = Calificaciones::where('alumno_id', $alumno->id);
        $calificaciones->delete();

        foreach ($requestCalificaciones as $asignaturaId => $notas){
            
            foreach ($notas as $index => $nota) {
                if(!is_null($nota)){
                    $calificaciones = new Calificaciones();
                    $calificaciones->alumno_id = $alumno->id;
                    $calificaciones->asignatura_id = $asignaturaId;
                    $calificaciones->nota = $nota;
                    $calificaciones->numero_convocatoria = $index <= 1 ? 1 : 2;
                    $calificaciones->saveOrFail();
                }
            }
        }

        return view("alumno.alumno_index", ["alumnos"=>Alumno::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        return view("calificaciones.calificaciones_edit", [
            "alumno" => $alumno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificaciones $calificaciones)
    {
        //
    }
}
