<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $table = 'Modulos';
    protected $primaryKey = 'id_Modulo';
    public $timestamps = false;

    protected $fillable = [
        'nombreModulo',
        'modulos',
        'id_Carrera'
    ];
}
