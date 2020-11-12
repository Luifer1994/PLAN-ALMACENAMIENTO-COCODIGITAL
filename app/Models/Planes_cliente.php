<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planes_cliente extends Model
{

    protected $fillable = [
        'id_plan',
        'id_usuario',
        'fechaInicio',
        'fechaFinal',
    ];
    use HasFactory;
}
