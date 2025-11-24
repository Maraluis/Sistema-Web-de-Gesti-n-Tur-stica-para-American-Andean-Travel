<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombres',
        'apellidos',  
        'tipo_documento',
        'documento',
        'correo',
        'telefono',
        'nacionalidad',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
