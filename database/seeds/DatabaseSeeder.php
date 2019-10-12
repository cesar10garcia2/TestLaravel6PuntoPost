<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CajaTableSeeder::class);
        $this->call(FormaPagoTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(TipoComprobanteTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
    }
}
