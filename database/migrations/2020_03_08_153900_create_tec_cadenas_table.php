<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecCadenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tec_cadenas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('titulo',55);
            $table->text('descripcion');
            $table->text('nivel');
            $table->integer('puntaje');
            $table->time('tiempo');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->char('imagen_id',55);
            $table->char('curso_id',55);
            $table->char('usuario_id',55);
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
        Schema::dropIfExists('tec_cadenas');
    }
}
