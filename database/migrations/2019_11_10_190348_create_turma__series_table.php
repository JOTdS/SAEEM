<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmaSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma__series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cargaHorario');
            $table->bigInteger('turma_id'); //Descomentando
            $table->bigInteger('serie_id'); //Descomentando
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
        Schema::dropIfExists('turma__series');
    }
}
