<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $fillable = [
        'tipo', 'placa', 'empresa', 'capacidad', 'estado',
    ];

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class);
    }
}
