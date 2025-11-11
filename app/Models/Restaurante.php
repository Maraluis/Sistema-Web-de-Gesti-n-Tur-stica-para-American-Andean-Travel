<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurante extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'pais',
        'tipo_cocina',
        'telefono',
        'email',
        'capacidad',
        'precio_promedio',
        'horario',
        'especialidades',
        'descripcion',
        'imagen'
    ];

    /**
     * Los paquetes que incluyen este restaurante
     */
    public function paquetes(): BelongsToMany
    {
        return $this->belongsToMany(Paquete::class, 'paquete_restaurante')
                    ->withPivot('tipo_servicio')
                    ->withTimestamps();
    }
}
