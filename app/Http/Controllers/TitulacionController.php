<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Illuminate\Http\Request;



class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("titulacion.titulacion_index", ["titulaciones"=>Titulacion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("titulacion.titulacion_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulacion = new Titulacion($request->input());
        $titulacion->saveOrFail();
        return redirect()->route("titulacion.index")->with(["mensaje" => "titulacion creada",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Titulacion $titulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulacion $titulacion)
    {
        return view("titulacion.titulacion_edit", ["titulacion" => $titulacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulacion $titulacion)
    {
        $titulacion->fill($request->input())->saveOrFail();
        return redirect()->route("titulacion.index")->with(["mensaje" => "Titulacion actualizada",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulacion $titulacion)
    {
        $titulacion->delete();
        return redirect()->route("titulacion.index")->with(["mensaje" => "Titulacion eliminada",
        ]);
    }
}
