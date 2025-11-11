<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hotel extends Model
{
    use HasFactory;
    
    protected $table = 'hoteles';
    
    /**
     * Get the route key name for Laravel.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
    
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'pais',
        'estrellas',
        'telefono',
        'email',
        'precio_noche',
        'capacidad',
        'servicios',
        'descripcion',
        'imagen'
    ];

    /**
     * Los paquetes que incluyen este hotel
     */
    public function paquetes(): BelongsToMany
    {
        return $this->belongsToMany(Paquete::class, 'hotel_paquete')
                    ->withPivot('noches')
                    ->withTimestamps();
    }
}
