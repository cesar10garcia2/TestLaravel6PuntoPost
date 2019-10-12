<?php

namespace Tests\Feature\Cliente;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateClienteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_a_cliente_by_api_post()
    {
        $user = $this->createUser();

        $data = [
            'tipo_documento_id' => 1,
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'celular' => '969641315',
            'documento_identidad' => '76435132',
            'empresa' => 'Sistema DE',
            'direccion_fiscal' => 'Villa primavera',
            'direccion_cobranza' => 'Villa primavera'
        ];

        $response = $this->actingAs($user)->post(route('api.cliente.store'), $data);


        $response->assertStatus(200)
            ->assertJson([
                'respuesta_operacion' => true,
            ]);

        $this->assertDatabaseHas('clientes', $data);
    }

    public function test_create_a_client_empty_by_api_post()
    {
        $user = $this->createUser();

        $data = [];

        $response = $this->actingAs($user)
            ->post(route('api.cliente.store'), $data);

        //$errors = session('errors');
        //dd($errors);
        $response->assertSessionHasErrors([
            'nombre' => 'El campo nombre es obligatorio.',
            'apellido' => 'El campo apellido es obligatorio.',
            'celular' => 'El campo celular es obligatorio.',
            'documento_identidad' => 'El campo documento identidad es obligatorio.',
            'tipo_documento_id' => 'El campo tipo documento id es obligatorio.'
        ]);
    }

    public function test_create_a_client_by_api_post_to_user_not_authenticated()
    {
        $user = $this->createUser();

        $data = [
            'tipo_documento_id' => 1,
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'celular' => '969641315',
            'documento_identidad' => '76435132',
            'empresa' => 'Sistema DE',
            'direccion_fiscal' => 'Villa primavera',
            'direccion_cobranza' => 'Villa primavera'
        ];

        $response = $this->post(route('api.cliente.store'), $data);

        $response->assertRedirect(route('login'));
    }
}
