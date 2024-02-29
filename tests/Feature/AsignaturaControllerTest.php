<?php

namespace Tests\Feature;

use App\Models\Asignatura;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AsignaturaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test index method.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

     public function testIndex()
    {
        $response = $this->get('/asignaturas');

        $response->assertStatus(200);
        $response->assertViewIs('asignaturas.index');
    }

    /**
     * Test create method.
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get('/asignaturas/create');

        $response->assertStatus(200);
        $response->assertViewIs('asignaturas.create');
    }

    /**
     * Test store method.
     *
     * @return void
     */
    public function testStore()
    {
        $response = $this->post('/asignaturas', [
            'denominacion' => 'Matemáticas',
            'numero_de_trimestres' => 3,
        ]);

        $response->assertRedirect('/asignaturas');

        $this->assertDatabaseHas('asignaturas', [
            'denominacion' => 'Matemáticas',
            'numero_de_trimestres' => 3,
        ]);
    }

    /**
     * Test show method.
     *
     * @return void
     */
    public function testShow()
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->get('/asignaturas/'.$asignatura->id);

        $response->assertStatus(200);
        $response->assertViewIs('asignaturas.show');
    }

    /**
     * Test edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->get('/asignaturas/'.$asignatura->id.'/edit');

        $response->assertStatus(200);
        $response->assertViewIs('asignaturas.edit');
    }

    /**
     * Test update method.
     *
     * @return void
     */
    public function testUpdate()
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->put('/asignaturas/'.$asignatura->id, [
            'denominacion' => 'Física',
            'numero_de_trimestres' => 2,
        ]);

        $response->assertRedirect('/asignaturas');

        $this->assertDatabaseHas('asignaturas', [
            'id' => $asignatura->id,
            'denominacion' => 'Física',
            'numero_de_trimestres' => 2,
        ]);
    }

    /**
     * Test destroy method.
     *
     * @return void
     */
    public function testDestroy()
    {
        $asignatura = Asignatura::factory()->create();

        $response = $this->delete('/asignaturas/'.$asignatura->id);

        $response->assertRedirect('/asignaturas');

        $this->assertDatabaseMissing('asignaturas', [
            'id' => $asignatura->id,
        ]);
    }
}
