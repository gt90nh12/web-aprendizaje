<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id_persona');
            $table->text('nombre');
            $table->text('apellido_paterno');
            $table->text('apeliido_materno');
            $table->date('fecha_nacimiento');
            $table->string('sexo',6);
            $table->integer('celular');
            $table->integer('ci');
            $table->text('correo_electronico');
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
        Schema::dropIfExists('personas');
    }
}
