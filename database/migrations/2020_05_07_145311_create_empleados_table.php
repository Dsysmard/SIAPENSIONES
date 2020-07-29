<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave');
            $table->string('rfc');
            $table->string('curp');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('nombre');
            $table->string('edo_civil');
            $table->string('estatus');
            $table->string('entidad');
            $table->string('tip_nom');
            $table->string('edo_res');
            $table->string('mun_res');
            $table->string('loc_res');
            $table->string('colonia');
            $table->string('num_calle');
            $table->string('fecha_alta');
            $table->string('fecha_modificacion');
            $table->string('fecha_baja');
            $table->string('motivo_baja');
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
        Schema::dropIfExists('empleados');
    }
}
