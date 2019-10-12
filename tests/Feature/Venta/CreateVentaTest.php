<?php

namespace Tests\Feature\Venta;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateVentaTest extends TestCase
{
    //use DatabaseTransactions;

    public function test_registrar_una_venta_exitosa()
    {
        $user = $this->createUser();

        $data = [
            'tipo_comprobante_id' => 1,
            'forma_pago_id' => 1,
            'cliente_id' => 1,
            'caja_id' => 1,
            'descuento' => "0.5",
            'producto_id' => [1, 3, 4, 5],
            'producto_cantidad' => [5, 2, 1, 8],
        ];

        $response = $this->actingAs($user)->post(route('api.venta.store'), $data);

        $response->assertStatus(200)
            ->assertJson([
                'respuesta_operacion' => true,
            ]);

        $data = [
            'tipo_comprobante_id' => 1,
            'forma_pago_id' => 1,
            'cliente_id' => 1,
            'caja_id' => 1,
            'descuento' => "0.5"
        ];
        $this->assertDatabaseHas('ventas', $data);
    }

    public function test_registrar_una_venta_sin_productos()
    { }
}
