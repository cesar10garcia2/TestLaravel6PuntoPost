<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_creacion_id');
            $table->foreign('user_creacion_id')->references('id')->on('users');

            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');


            $table->string('nombre');
            $table->string('apellido');
            $table->string('nombre_completo');
            $table->string('celular');
            $table->string('documento_identidad')->nullable();
            $table->string('empresa')->nullable();
            $table->string('direccion_fiscal')->nullable();
            $table->string('direccion_cobranza')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
