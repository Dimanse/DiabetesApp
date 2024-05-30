<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Historial;
use App\Models\Genero;
use App\Models\Informations;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function control()
    {
        return $this->hasMany(Control::class);
    }

    public function perfil()
    {
        return $this->hasOne(Historial::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'generos', 'genero');
    }

    // public function informacion()
    // {
    //     return $this->belongsTo(Informations::class, 'genero_id', 'generos');
    // }
}
