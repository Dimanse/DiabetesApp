<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'hora',
        'nombre',
        'gramos',
        'imagen',
        'cantidad',
        'recetado',
        'cuando',
        'observaciones',
        'user_id'
        
    ];


}
