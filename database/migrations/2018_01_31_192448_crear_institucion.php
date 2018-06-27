<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearInstitucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucion', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('razon_social')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('usuario')->nullable();
            $table->string('TipodePersona')->nullable()->default('INSTITUCION');
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
        Schema::dropIfExists('institucion');
    }
}
