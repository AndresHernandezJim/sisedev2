<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento', function (Blueprint $table) {
            $table->increments("id");
            $table->timestamp("fecha");
            $table->integer("id_modulo");
            $table->integer("id_persona");
            $table->string("movimiento",20);
            $table->integer("id_exp");
            $table->integer("id_anexo")->nullable();
            $table->integer("id_Tseguimiento")->nullable();
            $table->string("comentarios")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimiento');
    }
}
