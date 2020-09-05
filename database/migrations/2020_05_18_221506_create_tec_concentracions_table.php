<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecConcentracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tec_concentracions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('titulo',55);
            $table->text('descripcion');
            $table->text('nivel');
            $table->integer('puntaje');
            $table->time('tiempo');
            $table->char('archivo_id',55);
            $table->text('cantante');
            $table->text('letra');
            $table->json('palabras',55);
            $table->json('artistas');
            $table->integer('usuario_id');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
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
        Schema::dropIfExists('tec_concentracions');
    }
}
