<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TitulacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');;


Route::resource("titulacion", "App\Http\Controllers\TitulacionController")->parameters(["titulaciones"=>"titulacion"]);

Route::resource("asignatura", "App\Http\Controllers\AsignaturaController")->parameters(["asignaturas"=>"asignatura"]);

Route::resource("alumno", "App\Http\Controllers\AlumnoController")->parameters(["alumnos"=>"alumno"]);

Route::resource("calificaciones", "App\Http\Controllers\CalificacionesController");