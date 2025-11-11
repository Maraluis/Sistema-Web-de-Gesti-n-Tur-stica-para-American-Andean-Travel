<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition(): array
    {
        $fechaReserva = fake()->dateTimeBetween('now', '+1 month');
        $fechaInicio = fake()->dateTimeBetween($fechaReserva, '+2 months');
        $duracion = fake()->numberBetween(2, 7);
        $fechaFin = (clone $fechaInicio)->modify("+{$duracion} days");
        $precioBase = fake()->numberBetween(300, 2000);
        $numPersonas = fake()->numberBetween(1, 5);
        
        return [
            'cliente_id' => Cliente::factory(),
            'paquete_id' => Paquete::factory(),
            'fecha_reserva' => $fechaReserva->format('Y-m-d'),
            'fecha_inicio' => $fechaInicio->format('Y-m-d'),
            'fecha_fin' => $fechaFin->format('Y-m-d'),
            'num_personas' => $numPersonas,
            'precio_total' => $precioBase * $numPersonas,
            'estado' => fake()->randomElement(['pendiente', 'confirmada', 'cancelada']),
            'estado_pago' => fake()->randomElement(['pendiente', 'pagado']),
            'detalles' => fake()->optional()->sentence(),
        ];
    }
}
