<?php

namespace Database\Factories;

use App\Models\Paquete;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaqueteFactory extends Factory
{
    protected $model = Paquete::class;

    public function definition(): array
    {
        $destinos = [
            'Cusco - Machu Picchu',
            'Arequipa - Cañón del Colca',
            'Puno - Lago Titicaca',
            'Lima - City Tour',
            'Ica - Paracas',
            'Amazonas - Iquitos'
        ];
        
        return [
            'nombre' => fake()->randomElement($destinos),
            'descripcion' => fake()->paragraph(2),
            'destino' => fake()->randomElement(['Cusco', 'Arequipa', 'Puno', 'Lima', 'Ica']),
            'duracion' => fake()->numberBetween(2, 10),
            'precio' => fake()->numberBetween(300, 2500),
            'imagen' => null,
        ];
    }
}
