<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservaTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $cliente;
    protected $paquete;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->cliente = Cliente::factory()->create();
        $this->paquete = Paquete::factory()->create([
            'precio' => 500,
            'duracion' => 3
        ]);
    }

    /** @test */
    public function usuario_puede_ver_listado_de_reservas()
    {
        $this->actingAs($this->user);
        
        Reserva::factory()->count(3)->create([
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id
        ]);
        
        $response = $this->get(route('reservas.index'));
        
        $response->assertStatus(200);
        $response->assertViewIs('reserva.index');
    }

    /** @test */
    public function usuario_puede_crear_una_reserva()
    {
        $this->actingAs($this->user);
        
        $reservaData = [
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id,
            'fecha_reserva' => now()->format('Y-m-d'),
            'fecha_inicio' => now()->addDays(7)->format('Y-m-d'),
            'num_personas' => 2,
            'estado' => 'pendiente',
            'estado_pago' => 'pendiente',
            'detalles' => 'Reserva de prueba'
        ];
        
        $response = $this->post(route('reservas.store'), $reservaData);
        
        $response->assertRedirect(route('reservas.index'));
        $this->assertDatabaseHas('reservas', [
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id,
            'num_personas' => 2,
            'precio_total' => 1000 // 500 * 2
        ]);
    }

    /** @test */
    public function reserva_calcula_precio_total_correctamente()
    {
        $this->actingAs($this->user);
        
        $paquete = Paquete::factory()->create(['precio' => 750]);
        
        $reservaData = [
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $paquete->id,
            'fecha_reserva' => now()->format('Y-m-d'),
            'fecha_inicio' => now()->addDays(10)->format('Y-m-d'),
            'num_personas' => 4,
            'estado' => 'confirmada',
            'estado_pago' => 'pagado'
        ];
        
        $this->post(route('reservas.store'), $reservaData);
        
        $this->assertDatabaseHas('reservas', [
            'paquete_id' => $paquete->id,
            'num_personas' => 4,
            'precio_total' => 3000 // 750 * 4
        ]);
    }

    /** @test */
    public function reserva_calcula_fecha_fin_correctamente()
    {
        $this->actingAs($this->user);
        
        $paquete = Paquete::factory()->create(['duracion' => 5]);
        $fechaInicio = now()->addDays(15);
        
        $reservaData = [
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $paquete->id,
            'fecha_reserva' => now()->format('Y-m-d'),
            'fecha_inicio' => $fechaInicio->format('Y-m-d'),
            'num_personas' => 2,
            'estado' => 'confirmada',
            'estado_pago' => 'pendiente'
        ];
        
        $this->post(route('reservas.store'), $reservaData);
        
        $fechaFinEsperada = $fechaInicio->copy()->addDays(5)->format('Y-m-d');
        
        $this->assertDatabaseHas('reservas', [
            'paquete_id' => $paquete->id,
            'fecha_inicio' => $fechaInicio->format('Y-m-d'),
            'fecha_fin' => $fechaFinEsperada
        ]);
    }

    /** @test */
    public function usuario_puede_ver_detalle_de_reserva()
    {
        $this->actingAs($this->user);
        
        $reserva = Reserva::factory()->create([
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id
        ]);
        
        $response = $this->get(route('reservas.show', $reserva->id));
        
        $response->assertStatus(200);
        $response->assertSee($this->cliente->nombres);
        $response->assertSee($this->paquete->nombre);
    }

    /** @test */
    public function usuario_puede_actualizar_una_reserva()
    {
        $this->actingAs($this->user);
        
        $reserva = Reserva::factory()->create([
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id,
            'estado' => 'pendiente'
        ]);
        
        $updateData = [
            'cliente_id' => $reserva->cliente_id,
            'paquete_id' => $reserva->paquete_id,
            'fecha_reserva' => $reserva->fecha_reserva,
            'fecha_inicio' => $reserva->fecha_inicio,
            'num_personas' => $reserva->num_personas,
            'estado' => 'confirmada',
            'estado_pago' => 'pagado'
        ];
        
        $response = $this->put(route('reservas.update', $reserva->id), $updateData);
        
        $response->assertRedirect(route('reservas.index'));
        $this->assertDatabaseHas('reservas', [
            'id' => $reserva->id,
            'estado' => 'confirmada',
            'estado_pago' => 'pagado'
        ]);
    }

    /** @test */
    public function usuario_puede_eliminar_una_reserva()
    {
        $this->actingAs($this->user);
        
        $reserva = Reserva::factory()->create([
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id
        ]);
        
        $response = $this->delete(route('reservas.destroy', $reserva->id));
        
        $response->assertRedirect(route('reservas.index'));
        $this->assertDatabaseMissing('reservas', ['id' => $reserva->id]);
    }

    /** @test */
    public function no_se_puede_crear_reserva_con_fecha_inicio_anterior_a_fecha_reserva()
    {
        $this->actingAs($this->user);
        
        $reservaData = [
            'cliente_id' => $this->cliente->id,
            'paquete_id' => $this->paquete->id,
            'fecha_reserva' => now()->addDays(5)->format('Y-m-d'),
            'fecha_inicio' => now()->format('Y-m-d'), // Anterior a fecha_reserva
            'num_personas' => 2,
            'estado' => 'pendiente',
            'estado_pago' => 'pendiente'
        ];
        
        $response = $this->post(route('reservas.store'), $reservaData);
        
        $response->assertSessionHasErrors('fecha_inicio');
    }
}
