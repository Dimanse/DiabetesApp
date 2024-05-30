<?php

namespace App\Models;


use App\Models\Horario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'horario_id',
        'comentario_hora',
        'glucemia',
        'observaciones',
        'user_id'
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
