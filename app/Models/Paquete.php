<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    
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

    public function hoteles()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_paquete')
                    ->withPivot('noches')
                    ->withTimestamps();
    }

    public function restaurantes()
    {
        return $this->belongsToMany(Restaurante::class, 'paquete_restaurante')
                    ->withPivot('tipo_servicio')
                    ->withTimestamps();
    }
}
