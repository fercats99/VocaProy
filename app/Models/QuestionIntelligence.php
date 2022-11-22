<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionIntelligence extends Model
{
    use HasFactory;
    protected $fillable = [
        'pregunta',
    ];
    public $timestamps = false;
}
