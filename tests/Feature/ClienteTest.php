<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Crear usuario para autenticación
        $this->user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password123')
        ]);
    }

    /** @test */
    public function usuario_puede_ver_listado_de_clientes()
    {
        $this->actingAs($this->user);
        
        Cliente::factory()->count(3)->create();
        
        $response = $this->get(route('clientes.index'));
        
        $response->assertStatus(200);
        $response->assertViewIs('cliente.index');
        $response->assertViewHas('clientes');
    }

    /** @test */
    public function usuario_puede_crear_un_cliente()
    {
        $this->actingAs($this->user);
        
        $clienteData = [
            'nombres' => 'Juan Carlos',
            'apellidos' => 'Pérez García',
            'tipo_documento' => 'dni',
            'documento' => '12345678',
            'correo' => 'juan.perez@example.com',
            'telefono' => '987654321',
            'nacionalidad' => 'Peruana'
        ];
        
        $response = $this->post(route('clientes.store'), $clienteData);
        
        $response->assertRedirect(route('clientes.index'));
        $this->assertDatabaseHas('clientes', [
            'nombres' => 'Juan Carlos',
            'apellidos' => 'Pérez García',
            'documento' => '12345678',
            'correo' => 'juan.perez@example.com'
        ]);
    }

    /** @test */
    public function usuario_puede_ver_detalles_de_un_cliente()
    {
        $this->actingAs($this->user);
        
        $cliente = Cliente::factory()->create([
            'nombres' => 'María',
            'apellidos' => 'González'
        ]);
        
        $response = $this->get(route('clientes.show', $cliente->id));
        
        $response->assertStatus(200);
        $response->assertSee('María');
        $response->assertSee('González');
    }

    /** @test */
    public function usuario_puede_actualizar_un_cliente()
    {
        $this->actingAs($this->user);
        
        $cliente = Cliente::factory()->create([
            'nombres' => 'Pedro',
            'nacionalidad' => 'Peruana'
        ]);
        
        $updateData = [
            'nombres' => 'Pedro Luis',
            'apellidos' => $cliente->apellidos,
            'tipo_documento' => $cliente->tipo_documento,
            'documento' => $cliente->documento,
            'correo' => $cliente->correo,
            'telefono' => $cliente->telefono,
            'nacionalidad' => 'Argentina'
        ];
        
        $response = $this->put(route('clientes.update', $cliente->id), $updateData);
        
        $response->assertRedirect(route('clientes.index'));
        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nombres' => 'Pedro Luis',
            'nacionalidad' => 'Argentina'
        ]);
    }

    /** @test */
    public function usuario_puede_eliminar_un_cliente()
    {
        $this->actingAs($this->user);
        
        $cliente = Cliente::factory()->create();
        
        $response = $this->delete(route('clientes.destroy', $cliente->id));
        
        $response->assertRedirect(route('clientes.index'));
        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }

    /** @test */
    public function no_se_puede_crear_cliente_con_documento_duplicado()
    {
        $this->actingAs($this->user);
        
        Cliente::factory()->create(['documento' => '12345678']);
        
        $clienteData = [
            'nombres' => 'Otro',
            'apellidos' => 'Cliente',
            'tipo_documento' => 'dni',
            'documento' => '12345678', // Duplicado
            'correo' => 'otro@example.com',
            'telefono' => '999888777',
            'nacionalidad' => 'Peruana'
        ];
        
        $response = $this->post(route('clientes.store'), $clienteData);
        
        $response->assertSessionHasErrors('documento');
    }

    /** @test */
    public function no_se_puede_crear_cliente_con_correo_duplicado()
    {
        $this->actingAs($this->user);
        
        Cliente::factory()->create(['correo' => 'test@example.com']);
        
        $clienteData = [
            'nombres' => 'Otro',
            'apellidos' => 'Cliente',
            'tipo_documento' => 'dni',
            'documento' => '87654321',
            'correo' => 'test@example.com', // Duplicado
            'telefono' => '999888777',
            'nacionalidad' => 'Peruana'
        ];
        
        $response = $this->post(route('clientes.store'), $clienteData);
        
        $response->assertSessionHasErrors('correo');
    }
}
