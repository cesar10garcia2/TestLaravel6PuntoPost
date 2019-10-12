<?php

namespace Tests\Feature\Cliente;

use App\Cliente;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteClienteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_delete_a_user_success()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_delete_cliente()
    {

        $user = $this->createUser();
        $cliente = $this->createCliente($user);

        $response = $this->actingAs($user);
        $response->delete(route('api.cliente.destroy', $cliente->id))->assertJson([
            'respuesta_operacion' => true,
        ]);

        $this->assertDatabaseMissing('clientes', [
            'id' => $cliente->id
        ]);
    }

    public function createCliente($user)
    {
        $cliente = factory(Cliente::class)->create([
            'user_creacion_id' => $user->id
        ]);

        return $cliente;
    }
}
