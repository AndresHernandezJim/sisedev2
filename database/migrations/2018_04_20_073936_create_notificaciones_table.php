<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("id_actuario");
            $table->integer("id_usuario");
            $table->string("rol");
            $table->integer("id_exp");
            $table->integer("id_anexo");
            $table->timestamp("fecha_creacion")->nullable();
            $table->timestamp("fecha_solicitud")->nullable();
            $table->timestamp("fecha_limite")->nullable();
            $table->integer("autorizacion")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificaciones');
    }
}
