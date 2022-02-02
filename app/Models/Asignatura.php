<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = "asignaturas";
    protected $fillable = ["titulacion_id","nombre","creditos","curso","alumnos_max"];


    public static function getCurrentCourse(): String
    {
        $year = Carbon::now()->format('Y');
        $nextYear = Carbon::now()->addYears(1)->format('Y');
        return "$year-$nextYear";
    }
    /**
     * Get the titulacion that owns the asignatura.
     */
    public function titulacion()
    {
        return $this->belongsTo(Titulacion::class);
    }


}
