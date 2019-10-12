<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_cajas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idCaja');
            $table->foreign('idCaja')
                ->references('id')->on('cajas');


            $table->date('fecha');
            $table->double('cantidad_inicial');
            $table->double('cantidad_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_cajas');
    }
}
