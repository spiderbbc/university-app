<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;

    protected $table = "titulacions";
    protected $fillable = ["nombre",
    ];

    /**
     * Get the asignatura associated with the Titulacion.
     */
    public function asignatura()
    {
        return $this->hasOne(Asignatura::class);
    }
}
