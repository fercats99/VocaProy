<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrera',
        'tipo_carrera',
        'personalidad_1',
        'personalidad_2',
        'personalidad_3',
        'ambiente_laboral_1',
        'ambiente_laboral_2',
        'ambiente_laboral_3',
        'aptitud_1',
        'aptitud_2',
        'aptitud_3',
    ];
}
