<?php

use Illuminate\Database\Seeder;

class FormaPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_pagos')->insertGetId([
            'nombre' => 'EFECTIVO'
        ]);
        DB::table('forma_pagos')->insertGetId([
            'nombre' => 'DEPOSITO DE CUENTA'
        ]);
        DB::table('forma_pagos')->insertGetId([
            'nombre' => 'OTROS'
        ]);
    }
}
