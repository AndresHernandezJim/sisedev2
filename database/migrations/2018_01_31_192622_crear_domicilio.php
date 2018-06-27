<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearDomicilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('calle');
            $table->string("ninter")->nullable();
            $table->string("next")->nullable();
            $table->string('colonia');
            $table->string('municipio');
            $table->string('estado');
            $table->string('localidad',100)->nullable();
            $table->string('cp',6);
            $table->string('referencia');
            $table->boolean('oir')->default(0);
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
        Schema::dropIfExists('domicilio');
    }
}
