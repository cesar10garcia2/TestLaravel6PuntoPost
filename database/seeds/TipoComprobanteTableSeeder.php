<?php

use Illuminate\Database\Seeder;

class TipoComprobanteTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipo_comprobantes')->insertGetId([
            'nombre' => 'BOLETA',
            'impuesto' => '0'
        ]);
        DB::table('tipo_comprobantes')->insertGetId([
            'nombre' => 'FACTURA',
            'impuesto' => '18'
        ]);
        DB::table('tipo_comprobantes')->insertGetId([
            'nombre' => 'TICKET',
            'impuesto' => '0'
        ]);
    }
}
