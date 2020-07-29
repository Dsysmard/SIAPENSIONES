<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensionados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('rfc');
            $table->string('curp');
            $table->string('ap_paterno');
            $table->string('ap_meterno');
            $table->string('nombre');
            $table->string('edo_civil');
            $table->string('estatus');
            $table->string('tip_nom');
            $table->string('edo_res');
            $table->string('Mun_res');
            $table->string('loc_res');
            $table->string('colonia');
            $table->string('calle_num');
            $table->string('Fecha_final_lab');
            $table->string('fecha_modificacion');
            $table->string('fecha_baja');
            $table->string('modo_pension');
            $table->string('observaciones');
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
        Schema::dropIfExists('pensionados');
    }
}
