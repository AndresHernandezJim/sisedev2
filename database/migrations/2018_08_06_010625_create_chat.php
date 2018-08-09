<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_origen')->unsigned();
            $table->integer('id_receptor')->unsigned();
            $table->integer('id_exp');
            $table->longText('mensaje');
            $table->timestamp('fecha_creacion');
            $table->timesta('fecha_actualizacion')->nullable();
            $table->integer('estado');
            $table->integer('serie');
            $table->integer('id_proyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat');
    }
}
