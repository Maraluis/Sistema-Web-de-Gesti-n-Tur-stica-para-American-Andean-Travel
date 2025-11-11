<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Guia;
use App\Models\Transporte;
use App\Models\Paquete;
use App\Models\Reserva;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosCompletosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Limpiar tablas
        Reserva::truncate();
        Cliente::truncate();
        Guia::truncate();
        Transporte::truncate();
        Paquete::truncate();
        DB::table('guia_paquete')->truncate();
        DB::table('transporte_paquete')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // Crear Clientes
        $clientes = [
            [
                'nombres' => 'Luis',
                'apellidos' => 'Quispe',
                'tipo_documento' => 'dni',
                'documento' => '12345678',
                'correo' => 'luis.quispe@gmail.com',
                'telefono' => '987654321',
            ],
            [
                'nombres' => 'María',
                'apellidos' => 'García',
                'tipo_documento' => 'dni',
                'documento' => '23456789',
                'correo' => 'maria.garcia@hotmail.com',
                'telefono' => '976543210',
            ],
            [
                'nombres' => 'Carlos',
                'apellidos' => 'Mendoza',
                'tipo_documento' => 'dni',
                'documento' => '34567890',
                'correo' => 'carlos.mendoza@yahoo.com',
                'telefono' => '965432109',
            ],
            [
                'nombres' => 'Ana',
                'apellidos' => 'Torres',
                'tipo_documento' => 'dni',
                'documento' => '45678901',
                'correo' => 'ana.torres@gmail.com',
                'telefono' => '954321098',
            ],
            [
                'nombres' => 'Roberto',
                'apellidos' => 'Silva',
                'tipo_documento' => 'pasaporte',
                'documento' => 'P123456',
                'correo' => 'roberto.silva@outlook.com',
                'telefono' => '943210987',
            ],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create($cliente);
        }

        // Crear Guías
        $guias = [
            [
                'nombres' => 'Pedro Ramírez',
                'especialidad' => 'Turismo Cultural e Histórico',
                'idiomas' => 'Español, Inglés, Francés',
                'telefono' => '987123456',
                'email' => 'pedro.ramirez@guide.com',
                'foto' => null,
            ],
            [
                'nombres' => 'Sofía Vargas',
                'especialidad' => 'Ecoturismo y Aventura',
                'idiomas' => 'Español, Inglés, Alemán',
                'telefono' => '976234567',
                'email' => 'sofia.vargas@guide.com',
                'foto' => null,
            ],
            [
                'nombres' => 'Ricardo Flores',
                'especialidad' => 'Arqueología Inca',
                'idiomas' => 'Español, Inglés, Italiano',
                'telefono' => '965345678',
                'email' => 'ricardo.flores@guide.com',
                'foto' => null,
            ],
        ];

        foreach ($guias as $guia) {
            Guia::create($guia);
        }

        // Crear Transportes
        $transportes = [
            [
                'tipo' => 'Bus Turístico',
                'placa' => 'ABC-123',
                'empresa' => 'Turismo del Sur SAC',
                'capacidad' => 45,
                'estado' => 'activo',
            ],
            [
                'tipo' => 'Minivan',
                'placa' => 'DEF-456',
                'empresa' => 'Express Tours EIRL',
                'capacidad' => 12,
                'estado' => 'activo',
            ],
            [
                'tipo' => 'Camioneta 4x4',
                'placa' => 'GHI-789',
                'empresa' => 'Adventure Peru',
                'capacidad' => 7,
                'estado' => 'activo',
            ],
            [
                'tipo' => 'Bus Panorámico',
                'placa' => 'JKL-012',
                'empresa' => 'Andes Travel',
                'capacidad' => 50,
                'estado' => 'mantenimiento',
            ],
        ];

        foreach ($transportes as $transporte) {
            Transporte::create($transporte);
        }

        // Crear Paquetes
        $paquetes = [
            [
                'nombre' => 'Machu Picchu Clásico',
                'destino' => 'Cusco - Machu Picchu',
                'precio' => 500.00,
                'duracion' => 4,
                'descripcion' => 'Tour completo a la maravilla del mundo. Incluye transporte, guía, entradas y alojamiento.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Valle Sagrado de los Incas',
                'destino' => 'Cusco - Valle Sagrado',
                'precio' => 350.00,
                'duracion' => 2,
                'descripcion' => 'Visita a Pisac, Ollantaytambo y Chinchero. Incluye almuerzo típico.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Camino Inca 4 Días',
                'destino' => 'Cusco - Machu Picchu',
                'precio' => 850.00,
                'duracion' => 4,
                'descripcion' => 'Trekking por el famoso Camino Inca. Todo incluido con camping y comidas.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Lago Titicaca Místico',
                'destino' => 'Puno - Lago Titicaca',
                'precio' => 280.00,
                'duracion' => 2,
                'descripcion' => 'Islas flotantes de los Uros y Taquile. Experiencia cultural única.',
                'imagen' => null,
            ],
            [
                'nombre' => 'Cañón del Colca',
                'destino' => 'Arequipa - Colca',
                'precio' => 420.00,
                'duracion' => 3,
                'descripcion' => 'Observación del Cóndor Andino y aguas termales. Paisajes impresionantes.',
                'imagen' => null,
            ],
        ];

        foreach ($paquetes as $paquete) {
            Paquete::create($paquete);
        }

        // Asignar guías a paquetes
        DB::table('guia_paquete')->insert([
            ['guia_id' => 1, 'paquete_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['guia_id' => 1, 'paquete_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['guia_id' => 2, 'paquete_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['guia_id' => 3, 'paquete_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['guia_id' => 3, 'paquete_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Asignar transportes a paquetes
        DB::table('transporte_paquete')->insert([
            ['transporte_id' => 1, 'paquete_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['transporte_id' => 2, 'paquete_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['transporte_id' => 3, 'paquete_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['transporte_id' => 1, 'paquete_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['transporte_id' => 2, 'paquete_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Crear Reservas
        $reservas = [
            [
                'cliente_id' => 1,
                'paquete_id' => 1,
                'fecha_reserva' => '2025-11-10',
                'fecha_inicio' => '2025-11-15',
                'fecha_fin' => '2025-11-19',
                'num_personas' => 2,
                'precio_total' => 1000.00, // 500 * 2
                'estado' => 'confirmada',
                'estado_pago' => 'pagado',
                'detalles' => 'Cliente solicita habitación con vista',
            ],
            [
                'cliente_id' => 2,
                'paquete_id' => 2,
                'fecha_reserva' => '2025-11-11',
                'fecha_inicio' => '2025-11-20',
                'fecha_fin' => '2025-11-22',
                'num_personas' => 1,
                'precio_total' => 350.00,
                'estado' => 'confirmada',
                'estado_pago' => 'pendiente',
                'detalles' => 'Requiere dieta vegetariana',
            ],
            [
                'cliente_id' => 3,
                'paquete_id' => 3,
                'fecha_reserva' => '2025-11-12',
                'fecha_inicio' => '2025-12-01',
                'fecha_fin' => '2025-12-05',
                'num_personas' => 3,
                'precio_total' => 2550.00, // 850 * 3
                'estado' => 'pendiente',
                'estado_pago' => 'pendiente',
                'detalles' => 'Grupo familiar con niños',
            ],
            [
                'cliente_id' => 4,
                'paquete_id' => 4,
                'fecha_reserva' => '2025-11-13',
                'fecha_inicio' => '2025-11-25',
                'fecha_fin' => '2025-11-27',
                'num_personas' => 2,
                'precio_total' => 560.00, // 280 * 2
                'estado' => 'confirmada',
                'estado_pago' => 'pagado',
                'detalles' => 'Aniversario de bodas',
            ],
            [
                'cliente_id' => 1,
                'paquete_id' => 5,
                'fecha_reserva' => '2025-11-14',
                'fecha_inicio' => '2025-12-10',
                'fecha_fin' => '2025-12-13',
                'num_personas' => 4,
                'precio_total' => 1680.00, // 420 * 4
                'estado' => 'confirmada',
                'estado_pago' => 'pendiente',
                'detalles' => 'Viaje en grupo de amigos',
            ],
        ];

        foreach ($reservas as $reserva) {
            Reserva::create($reserva);
        }

        $this->command->info('✅ Datos completos creados exitosamente!');
        $this->command->info('👥 5 Clientes');
        $this->command->info('🧑‍🏫 3 Guías');
        $this->command->info('🚌 4 Transportes');
        $this->command->info('📦 5 Paquetes');
        $this->command->info('📋 5 Reservas');
    }
}
