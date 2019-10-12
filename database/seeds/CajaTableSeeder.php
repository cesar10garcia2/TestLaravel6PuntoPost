<?php

use Illuminate\Database\Seeder;

class CajaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cajas')->insert([
            'nombre' => 'CAJA 1'
        ]);

        DB::table('tipo_documentos')->insert([
            'nombre' => 'CAJA 2'
        ]);
    }
}
