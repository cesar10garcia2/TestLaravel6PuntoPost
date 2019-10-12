<?php

use Illuminate\Database\Seeder;

class ProductoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'IMPRESORA HP',
            'precio_venta' => '650',
            'costo_total' => '470'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'IMPRESORA EPSON',
            'precio_venta' => '850',
            'costo_total' => '672'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'LAPTOP TOSHIVA',
            'precio_venta' => '2100',
            'costo_total' => '1796'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'LAPTOP HP',
            'precio_venta' => '1860',
            'costo_total' => '1360'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'LAPTOP SANSUNG',
            'precio_venta' => '1800',
            'costo_total' => '1480'
        ]);
    }
}
