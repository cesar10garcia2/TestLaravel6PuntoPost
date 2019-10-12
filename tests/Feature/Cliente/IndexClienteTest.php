<?php

namespace Tests\Feature\Cliente;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class IndexClienteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_litado_cliente()
    {
        $user = $this->createUser();
        $response = $this->actingAs($user)
            ->get(route('api.cliente.index'));

        $response->assertJson([
            'model' => [
                'per_page' => 5
            ]
        ]);

        $response->assertStatus(200);
    }
}
