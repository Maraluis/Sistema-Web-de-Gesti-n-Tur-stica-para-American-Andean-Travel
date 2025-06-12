<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    protected $fillable = [
        'nombres', 'especialidad', 'idiomas', 'telefono', 'email', 'foto',
    ];

    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class);
    }
}
