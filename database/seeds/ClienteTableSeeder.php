<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'user_creacion_id' => '1',
            'tipo_documento_id' => '1',
            'nombre' => 'Cesar',
            'apellido' => 'Garcia',
            'nombre_completo' => 'Cesar Garcia',
            'celular' => '969641315'
        ]);
    }
}
