<?php

namespace Database\Seeders;

use App\Models\Reserva;
use App\Models\Paquete;
use Illuminate\Database\Seeder;

class UpdateReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Actualizar todas las reservas para agregar datos faltantes
        $reservas = Reserva::all();
        
        foreach ($reservas as $reserva) {
            // Si no tiene fecha_inicio, usar fecha_reserva
            if (!$reserva->fecha_inicio) {
                $reserva->fecha_inicio = $reserva->fecha_reserva;
            }
            
            // Si no tiene fecha_fin, calcular basado en la duración del paquete
            if (!$reserva->fecha_fin && $reserva->paquete) {
                $fechaInicio = \Carbon\Carbon::parse($reserva->fecha_inicio);
                $reserva->fecha_fin = $fechaInicio->addDays($reserva->paquete->duracion);
            }
            
            // Si no tiene precio_total, usar el precio del paquete
            if (!$reserva->precio_total && $reserva->paquete) {
                $reserva->precio_total = $reserva->paquete->precio;
            }
            
            // Si no tiene num_personas, poner 1 por defecto
            if (!$reserva->num_personas) {
                $reserva->num_personas = 1;
            }
            
            // Si no tiene estado_pago, poner pendiente por defecto
            if (!$reserva->estado_pago) {
                $reserva->estado_pago = 'pendiente';
            }
            
            $reserva->save();
        }
        
        $this->command->info('Reservas actualizadas correctamente.');
    }
}
