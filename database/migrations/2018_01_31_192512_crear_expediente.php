<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearExpediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_usuario");
            $table->integer('id_demandante');
            $table->integer('id_demandado');
            $table->integer('expediente');
            $table->text('descripcion')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('serie')->dafault(2018);
            $table->integer('idtipo');
            $table->timestamp("fecha");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expediente');
    }
}
