<?php

namespace Tests\Feature\Venta;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class IndexVentaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_listado_ventas()
    {
        $user = $this->createUser();
        $response = $this->actingAs($user)
            ->get(route('api.venta.index'));

        $response->assertJson([
            'model' => [
                'per_page' => 5
            ]
        ]);
        $response->assertStatus(200);
    }



    public function test_anular_venta()
    { }
}
