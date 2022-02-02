<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = "alumnos";
    protected $fillable = ["nombres","apellidos","año_nacimiento"];

    /**
     * Get the matricula associated with the student.
     */
    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }
}
