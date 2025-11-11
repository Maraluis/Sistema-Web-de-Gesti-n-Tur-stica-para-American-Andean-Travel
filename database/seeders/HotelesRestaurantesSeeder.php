<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Restaurante;
use Illuminate\Database\Seeder;

class HotelesRestaurantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear hoteles de ejemplo
        Hotel::create([
            'nombre' => 'Hotel Cusco Plaza',
            'direccion' => 'Plaza de Armas 123',
            'ciudad' => 'Cusco',
            'pais' => 'Perú',
            'estrellas' => 5,
            'telefono' => '+51 84 123456',
            'email' => 'info@cuscoplaza.com',
            'precio_noche' => 150.00,
            'capacidad' => 100,
            'servicios' => 'WiFi, Piscina, Spa, Restaurante, Bar',
            'descripcion' => 'Hotel de lujo ubicado en el corazón de Cusco con vista a la Plaza de Armas'
        ]);

        Hotel::create([
            'nombre' => 'Hotel Machu Picchu Pueblo',
            'direccion' => 'Av. Hermanos Ayar 456',
            'ciudad' => 'Machu Picchu',
            'pais' => 'Perú',
            'estrellas' => 4,
            'telefono' => '+51 84 234567',
            'email' => 'reservas@machupicchupueblo.com',
            'precio_noche' => 120.00,
            'capacidad' => 60,
            'servicios' => 'WiFi, Restaurante, Bar, Transporte incluido',
            'descripcion' => 'Hotel boutique cerca de la maravilla de Machu Picchu'
        ]);

        Hotel::create([
            'nombre' => 'Hotel Lima Airport',
            'direccion' => 'Av. Elmer Faucett 789',
            'ciudad' => 'Lima',
            'pais' => 'Perú',
            'estrellas' => 3,
            'telefono' => '+51 1 345678',
            'email' => 'contacto@limaairport.com',
            'precio_noche' => 80.00,
            'capacidad' => 80,
            'servicios' => 'WiFi, Desayuno, Estacionamiento',
            'descripcion' => 'Hotel económico cerca del aeropuerto internacional Jorge Chávez'
        ]);

        // Crear restaurantes de ejemplo
        Restaurante::create([
            'nombre' => 'Inka Grill',
            'direccion' => 'Portal de Panes 115',
            'ciudad' => 'Cusco',
            'pais' => 'Perú',
            'tipo_cocina' => 'Peruana',
            'telefono' => '+51 84 262992',
            'email' => 'reservas@inkagrill.com',
            'precio_promedio' => 45.00,
            'capacidad' => 120,
            'horario' => '11:00 - 23:00',
            'especialidades' => 'Alpaca, Cuy, Lomo Saltado, Ceviche',
            'descripcion' => 'Restaurante de cocina peruana contemporánea en la Plaza de Armas'
        ]);

        Restaurante::create([
            'nombre' => 'El Mercado',
            'direccion' => 'Av. Hipólito Unanue 203',
            'ciudad' => 'Lima',
            'pais' => 'Perú',
            'tipo_cocina' => 'Mariscos',
            'telefono' => '+51 1 221-1322',
            'email' => 'info@elmercado.pe',
            'precio_promedio' => 55.00,
            'capacidad' => 80,
            'horario' => '12:00 - 17:00',
            'especialidades' => 'Ceviche, Tiradito, Causa, Arroz con Mariscos',
            'descripcion' => 'El mejor ceviche de Lima, cocina de mar fresca'
        ]);

        Restaurante::create([
            'nombre' => 'Chicha por Gastón Acurio',
            'direccion' => 'Plaza Regocijo 261',
            'ciudad' => 'Cusco',
            'pais' => 'Perú',
            'tipo_cocina' => 'Peruana Fusión',
            'telefono' => '+51 84 240520',
            'email' => 'cusco@chicha.com.pe',
            'precio_promedio' => 60.00,
            'capacidad' => 100,
            'horario' => '12:00 - 23:00',
            'especialidades' => 'Rocoto Relleno, Chicharrón, Tamal Cusqueño',
            'descripcion' => 'Restaurante del chef Gastón Acurio con sabores andinos'
        ]);

        Restaurante::create([
            'nombre' => 'La Lucha Sanguchería',
            'direccion' => 'Av. La Mar 1337',
            'ciudad' => 'Lima',
            'pais' => 'Perú',
            'tipo_cocina' => 'Sándwiches',
            'telefono' => '+51 1 445-0123',
            'email' => 'lalucha@gmail.com',
            'precio_promedio' => 15.00,
            'capacidad' => 40,
            'horario' => '07:00 - 22:00',
            'especialidades' => 'Chicharrón, Pollo, Lomo, Palta Rellena',
            'descripcion' => 'Los mejores sándwiches peruanos de Lima'
        ]);
    }
}
