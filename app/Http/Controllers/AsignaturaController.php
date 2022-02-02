<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Titulacion;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("asignatura.asignatura_index", ["asignaturas"=>Asignatura::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Asignatura::getCurrentCourse();
        $titulaciones = Titulacion::all();
        return view("asignatura.asignatura_create", [
            "titulaciones"=>Titulacion::all(),
            "course" => $course,
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
        $asignatura = new Asignatura($request->input());
        $asignatura->saveOrFail();
        return redirect()->route("asignatura.index")->with(["mensaje" => "asignatura creada",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return view("asignatura.asignatura_edit", [
            "asignatura" => $asignatura,
            "titulaciones"=>Titulacion::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->fill($request->input())->saveOrFail();
        return redirect()->route("asignatura.index")->with(["mensaje" => "Asignatura actualizada",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route("asignatura.index")->with(["mensaje" => "Asignatura eliminada",
        ]);
    }
}
