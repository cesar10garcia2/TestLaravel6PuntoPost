<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('tipo_comprobante_id');
            $table->foreign('tipo_comprobante_id')
                ->references('id')->on('tipo_comprobantes');

            $table->unsignedBigInteger('forma_pago_id');
            $table->foreign('forma_pago_id')
                ->references('id')->on('forma_pagos');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')->on('clientes');

            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')
                ->references('id')->on('cajas');

            $table->integer('serie_comprobante');
            $table->integer('num_comprobante');
            $table->dateTime('fecha_hora');
            $table->double('impuesto');
            $table->double('descuento');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
