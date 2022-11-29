<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacionGeneral extends Model
{
    protected $table = 'InformacionGeneral';
    protected $primaryKey = 'id_Carrera';
    public $timestamps = false;

    protected $fillable = [
        'nombreCarrera',
        'descripcion',
        'duracion',
        'movilidad',
        'campoProfesional',
        'perfilAspitante',
        'perfilEgresado',
        'nombreSede',
        'linkSede'
    ];
}
