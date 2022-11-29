<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ambienteLaboral1',
        'ambienteLaboral2',
        'ambienteLaboral3',
        'personalidad1',
        'personalidad2',
        'personalidad3',
        'aptitud1',
        'aptitud2',
        'aptitud3',
    ];
}
