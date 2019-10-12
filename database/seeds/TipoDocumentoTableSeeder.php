<?php

use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            'nombre' => 'DNI'
        ]);
        DB::table('tipo_documentos')->insert([
            'nombre' => 'RUC'
        ]);
    }
}
