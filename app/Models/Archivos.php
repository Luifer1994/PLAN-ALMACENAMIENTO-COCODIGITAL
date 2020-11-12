<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{

    protected $fillable = [
        'nombre',
        'id_usuario',
        'id_planCliente'
    ];

    use HasFactory;
}
