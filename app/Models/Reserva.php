<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cliente_id', 'paquete_id', 'fecha_reserva', 'fecha_inicio', 'fecha_fin', 
        'num_personas', 'precio_total', 'estado', 'estado_pago', 'detalles',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}
