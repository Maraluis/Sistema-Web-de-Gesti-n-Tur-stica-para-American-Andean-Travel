<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName() . ' ' . fake()->lastName(),
            'tipo_documento' => fake()->randomElement(['dni', 'carnet', 'pasaporte']),
            'documento' => fake()->unique()->numerify('########'),
            'correo' => fake()->unique()->safeEmail(),
            'telefono' => fake()->numerify('9########'),
            'nacionalidad' => fake()->randomElement(['Peruana', 'Argentina', 'Chilena', 'Colombiana', 'Española']),
        ];
    }
}
