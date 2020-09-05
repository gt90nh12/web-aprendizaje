<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('prueba');
            $table->text('tipo_pregunta');
            $table->text('pregunta');
            $table->text('imagen');
            $table->json('respuesta');
            $table->integer('puntaje');
            $table->time('tiempo_respuesta');
            $table->integer('orden');
            $table->integer('usuario_id');
            $table->timestamps();
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pruebas');
    }
}
