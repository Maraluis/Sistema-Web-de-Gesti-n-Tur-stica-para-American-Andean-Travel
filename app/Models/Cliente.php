<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',  
        'tipo_documento',
        'documento',
        'correo',
        'telefono',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class);
    }
}
