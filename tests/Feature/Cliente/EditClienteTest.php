<?php

namespace Tests\Feature\Cliente;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EditClienteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_update_a_cliente_by_api_post()
    {
        $user = $this->createUser();

        $data = [
            'tipo_documento_id' => 1,
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'nombre_completo' => 'Cesar Garcia',
            'celular' => '969641315',
            'documento_identidad' => '76435132',
            'empresa' => 'Sistema DE',
            'direccion_fiscal' => 'Villa primavera',
            'direccion_cobranza' => 'Villa primavera',
            'user_creacion_id' => '1'
        ];

        $cliente_id = DB::table('clientes')->insertGetId($data);


        $data_update = [
            'tipo_documento_id' => 2,
            'nombre' => 'Cesar2',
            'apellido' => 'Garcia2',
            'celular' => '969641312',
            'documento_identidad' => '26435132',
            'empresa' => 'Sistema DE2',
            'direccion_fiscal' => 'Villa primavera2',
            'direccion_cobranza' => 'Villa primavera2'
        ];

        $response = $this->actingAs($user)
            ->post(route('api.cliente.update', $cliente_id), $data_update);


        $response->assertStatus(200)
            ->assertJson([
                'respuesta_operacion' => true,
            ]);

        $this->assertDatabaseHas('clientes', $data_update);
    }

    public function test_update_a_client_empty_by_api_post()
    {
        $user = $this->createUser();

        $data = [
            'tipo_documento_id' => 1,
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'nombre_completo' => 'Cesar Garcia',
            'celular' => '969641315',
            'documento_identidad' => '76435132',
            'empresa' => 'Sistema DE',
            'direccion_fiscal' => 'Villa primavera',
            'direccion_cobranza' => 'Villa primavera',
            'user_creacion_id' => '1'
        ];

        $cliente_id = DB::table('clientes')->insertGetId($data);

        $data_update = [];

        $response = $this->actingAs($user)
            ->post(route('api.cliente.update', $cliente_id), $data_update);

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

    public function test_update_a_client_by_api_post_to_user_not_authenticated()
    {
        $user = $this->createUser();

        $data = [
            'tipo_documento_id' => 1,
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'nombre_completo' => 'Cesar Garcia',
            'celular' => '969641315',
            'documento_identidad' => '76435132',
            'empresa' => 'Sistema DE',
            'direccion_fiscal' => 'Villa primavera',
            'direccion_cobranza' => 'Villa primavera',
            'user_creacion_id' => '1'
        ];

        $cliente_id = DB::table('clientes')->insertGetId($data);


        $data_update = [
            'tipo_documento_id' => 2,
            'nombre' => 'Cesar2',
            'apellido' => 'Garcia2',
            'celular' => '969641312',
            'documento_identidad' => '26435132',
            'empresa' => 'Sistema DE2',
            'direccion_fiscal' => 'Villa primavera2',
            'direccion_cobranza' => 'Villa primavera2'
        ];

        $response = $this->post(route('api.cliente.update', $cliente_id), $data_update);

        $response->assertRedirect(route('login'));
    }
}
