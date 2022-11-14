<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanEstudios extends Model
{
    protected $table = 'PlanEstudios';
    protected $primaryKey = 'id_AreaFormacion';
    public $timestamps = false;

    protected $fillable = [
        'nombreArea',
        'creditos',
        'porcentaje',
        'unidadAprendizaje',
        'id_Carrera'
    ];
}
