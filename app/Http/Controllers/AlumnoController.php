<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\Matricula_Asignatura;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("alumno.alumno_index", ["alumnos"=>Alumno::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all asignaturas
        $asignaturas = Asignatura::all()->toArray();
        // look up count Matricula_Asignatura count
        foreach ($asignaturas as $index => $asignatura){
            $countMatriculaAsignatura = Matricula_Asignatura::where('asignatura_id',$asignatura['id'])->count();
            if ($countMatriculaAsignatura >= $asignatura['alumnos_max']){
                unset($asignaturas[$index]);
            }
        }
        $asignaturas = array_values($asignaturas);
        return view("alumno.alumno_create",[
            'asignaturas' => $asignaturas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumno($request->input());
        $alumno->saveOrFail();
        // create new matricula entity
        $matricula = new Matricula();
        $matricula->alumno_id = $alumno->id;
        $matricula->saveOrFail();
        // save asignaturas
        $asignaturasId = $request->input('asignaturas');
        foreach ($asignaturasId as $index => $id){
            $matriculaAsignatura = new Matricula_Asignatura();
            $matriculaAsignatura->matricula_id = $matricula->id;
            $matriculaAsignatura->asignatura_id = $id;
            $matriculaAsignatura->saveOrFail();
        }

        return redirect()->route("alumno.index")->with(["mensaje" => "alumno creada",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route("alumno.index")->with(["mensaje" => "alumno eliminado",
        ]);
    }
}
