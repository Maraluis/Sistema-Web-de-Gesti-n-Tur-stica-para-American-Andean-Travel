<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $fillable = [
        'nombre',
        'destino',
        'precio',
        'duracion',
        'descripcion',
        'imagen',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function guias()
    {
        return $this->belongsToMany(Guia::class);
    }

    public function transportes()
    {
        return $this->belongsToMany(Transporte::class);
    }

    public function opiniones()
    {
        return $this->hasMany(Opinion::class);
    }
}
