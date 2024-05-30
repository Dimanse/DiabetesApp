<?php

namespace App\Models;


use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'imagen',
        'genero_id',
        'fecha_nacimiento',
        'peso',
        'estatura',
        'alergias',
        'antecedentes_familiares',
        'enfermedades_cronicas',
        'procedimientos_quirurgicos',
        'condiciones_pasadas',
        'doctor',
        'clinica',
        'observaciones',
        'user_id'
        
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
