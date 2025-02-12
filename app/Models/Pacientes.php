<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'rut',
        'nombre',
        'apellido_p',
        'apellido_m',
        'sexo',
        'birth',
        'telefono',
        'email',
        'region',
        'comuna',
        'direccion',
        'estado',
    ];
   
}
