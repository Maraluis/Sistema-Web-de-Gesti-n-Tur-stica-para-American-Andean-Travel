<?php

namespace Tests\Feature;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelViewTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Crear un usuario para autenticación
        $this->user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password123')
        ]);
    }

    /**
     * Test: Usuario puede ver la lista de hoteles
     */
    public function test_usuario_autenticado_puede_ver_lista_de_hoteles(): void
    {
        // Crear hoteles de prueba
        Hotel::factory()->count(3)->create();

        // Autenticar usuario y hacer petición
        $response = $this->actingAs($this->user)->get(route('hoteles.index'));

        // Verificaciones
        $response->assertStatus(200);
        $response->assertViewIs('hotel.index');
        $response->assertViewHas('hoteles');
        $response->assertSee('Lista de hoteles');
    }

    /**
     * Test: Usuario no autenticado es redirigido al login
     */
    public function test_usuario_no_autenticado_no_puede_ver_lista_de_hoteles(): void
    {
        $response = $this->get(route('hoteles.index'));

        $response->assertRedirect(route('login'));
    }

    /**
     * Test: Usuario puede ver detalles de un hotel específico
     */
    public function test_usuario_puede_ver_detalles_de_un_hotel(): void
    {
        // Crear hotel de prueba
        $hotel = Hotel::factory()->create([
            'nombre' => 'Hotel Test Paradise',
            'ciudad' => 'Cusco',
            'pais' => 'Perú',
            'estrellas' => 5,
            'precio_noche' => 250.00,
            'capacidad' => 100
        ]);

        // Autenticar y hacer petición
        $response = $this->actingAs($this->user)->get(route('hoteles.show', ['hotele' => $hotel]));

        // Verificaciones
        $response->assertStatus(200);
        $response->assertViewIs('hotel.show');
        $response->assertViewHas('hotel');
        $response->assertSee('Hotel Test Paradise');
        $response->assertSee('Cusco');
        $response->assertSee('S/ 250.00');
        $response->assertSee('100 personas');
    }

    /**
     * Test: Usuario puede ver formulario de creación de hotel
     */
    public function test_usuario_puede_ver_formulario_de_crear_hotel(): void
    {
        $response = $this->actingAs($this->user)->get(route('hoteles.create'));

        $response->assertStatus(200);
        $response->assertViewIs('hotel.create');
        $response->assertSee('Crear hotel');
    }

    /**
     * Test: Usuario puede ver formulario de edición de hotel
     */
    public function test_usuario_puede_ver_formulario_de_editar_hotel(): void
    {
        $hotel = Hotel::factory()->create(['nombre' => 'Hotel a Editar']);

        $response = $this->actingAs($this->user)->get(route('hoteles.edit', ['hotele' => $hotel]));

        $response->assertStatus(200);
        $response->assertViewIs('hotel.edit');
        $response->assertViewHas('hotel');
        $response->assertSee('Hotel a Editar');
    }

    /**
     * Test: Vista de lista muestra información correcta de hoteles
     */
    public function test_lista_de_hoteles_muestra_informacion_correcta(): void
    {
        // Crear hoteles con datos específicos
        $hotel1 = Hotel::factory()->create([
            'nombre' => 'Hotel Cusco Plaza',
            'ciudad' => 'Cusco',
            'estrellas' => 5
        ]);

        $hotel2 = Hotel::factory()->create([
            'nombre' => 'Hotel Lima Airport',
            'ciudad' => 'Lima',
            'estrellas' => 3
        ]);

        $response = $this->actingAs($this->user)->get(route('hoteles.index'));

        $response->assertStatus(200);
        $response->assertSee('Hotel Cusco Plaza');
        $response->assertSee('Hotel Lima Airport');
        $response->assertSee('Cusco');
        $response->assertSee('Lima');
    }

    /**
     * Test: Vista de hotel muestra todos los campos
     */
    public function test_vista_detalle_muestra_todos_los_campos_del_hotel(): void
    {
        $hotel = Hotel::factory()->create([
            'nombre' => 'Hotel Completo Test',
            'direccion' => 'Av. Principal 123',
            'ciudad' => 'Arequipa',
            'pais' => 'Perú',
            'estrellas' => 4,
            'telefono' => '987654321',
            'email' => 'hotel@test.com',
            'precio_noche' => 180.50,
            'capacidad' => 80,
            'servicios' => 'WiFi, Piscina, Spa',
            'descripcion' => 'Hotel de lujo en el centro'
        ]);

        $response = $this->actingAs($this->user)->get(route('hoteles.show', ['hotele' => $hotel]));

        $response->assertStatus(200);
        $response->assertSee('Hotel Completo Test');
        $response->assertSee('Av. Principal 123');
        $response->assertSee('Arequipa');
        $response->assertSee('987654321');
        $response->assertSee('hotel@test.com');
        $response->assertSee('S/ 180.50');
        $response->assertSee('WiFi, Piscina, Spa');
        $response->assertSee('Hotel de lujo en el centro');
    }

    /**
     * Test: Vista de lista muestra botones de acción
     */
    public function test_lista_de_hoteles_muestra_botones_de_accion(): void
    {
        $hotel = Hotel::factory()->create(['nombre' => 'Hotel con Acciones']);

        $response = $this->actingAs($this->user)->get(route('hoteles.index'));

        $response->assertStatus(200);
        $response->assertSee('Ver');
        $response->assertSee('Editar');
        $response->assertSee('Eliminar');
    }

    /**
     * Test: Verificar que la vista maneja hoteles sin datos opcionales
     */
    public function test_vista_maneja_hoteles_con_datos_opcionales_vacios(): void
    {
        $hotel = Hotel::factory()->create([
            'nombre' => 'Hotel Básico',
            'direccion' => 'Calle 123',
            'ciudad' => 'Lima',
            'pais' => null,
            'estrellas' => null,
            'servicios' => null,
            'descripcion' => null
        ]);

        $response = $this->actingAs($this->user)->get(route('hoteles.show', ['hotele' => $hotel]));

        $response->assertStatus(200);
        $response->assertSee('Hotel Básico');
    }
}
