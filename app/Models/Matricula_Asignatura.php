<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Matricula_Asignatura extends Pivot
{
    use HasFactory;
    public $incrementing = true;
    protected $table = "matricula__asignaturas";
    protected $fillable = ["matricula_id","asignatura_id"];
}
