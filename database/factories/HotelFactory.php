<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ciudades = ['Cusco', 'Lima', 'Arequipa', 'Puno', 'Trujillo', 'Chiclayo', 'Piura', 'Iquitos'];
        
        return [
            'nombre' => 'Hotel ' . fake()->company(),
            'direccion' => fake()->address(),
            'ciudad' => fake()->randomElement($ciudades),
            'pais' => 'Perú',
            'estrellas' => fake()->numberBetween(1, 5),
            'telefono' => fake()->optional(0.8)->numerify('9########'),
            'email' => fake()->optional(0.8)->safeEmail(),
            'precio_noche' => fake()->randomFloat(2, 50, 500),
            'capacidad' => fake()->numberBetween(20, 200),
            'servicios' => fake()->optional(0.7)->randomElement([
                'WiFi, Piscina, Gimnasio',
                'WiFi, Restaurante, Bar',
                'WiFi, Spa, Jacuzzi',
                'WiFi, Estacionamiento, Desayuno incluido'
            ]),
            'descripcion' => fake()->optional(0.7)->paragraph(),
            'imagen' => null,
        ];
    }
}
