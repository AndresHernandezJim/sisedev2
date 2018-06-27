<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearAnexopdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexopdf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Folio');
            $table->integer('id_Tipo');
            $table->integer('id_Expediente');
            $table->timestamp('FechaUp');
            $table->string('PathAnexo');
            $table->longtext('NomFile');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexopdf');
    }
}
