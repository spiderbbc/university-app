<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    protected $table = "calificaciones";
    protected $fillable = ["alumno_id","asignatura_id","nota","numero_convocatoria"];
}
