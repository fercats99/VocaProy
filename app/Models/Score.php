<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Score extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'personalidades', 'aptitudes', 'ambLaboral'];
    protected function personalidades(): Attribute
    // Para poder utilizar arrays utilizamos json con las siguientes funciones
    {

        return Attribute::make(

            get: fn ($value) => json_decode($value, true),

            set: fn ($value) => json_encode($value),

        );
    }
    protected function aptitudes(): Attribute

    {

        return Attribute::make(

            get: fn ($value) => json_decode($value, true),

            set: fn ($value) => json_encode($value),

        );
    }
    protected function ambLaboral(): Attribute

    {

        return Attribute::make(

            get: fn ($value) => json_decode($value, true),

            set: fn ($value) => json_encode($value),

        );
    }
}
