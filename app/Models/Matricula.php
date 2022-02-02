<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    protected $table = "matriculas";
    protected $fillable = ["id","alumno_id"];

    /**
     * Get the alumno associated with the Matricula.
     */
    public function alumno()
    {
        return $this->hasOne(Alumno::class);
    }

    /**
     * The asignaturas that belong to the matricula.
     */
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class,'matricula_asignaturas')->using(Matricula_Asignatura::class);
    }
}
