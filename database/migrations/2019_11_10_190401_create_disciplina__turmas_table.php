<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina__turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('turno');
            $table->year('ano');
            $table->bigInteger('disciplina_id'); //Descomentando
            $table->bigInteger('turma_id'); //Descomentando
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
        Schema::dropIfExists('disciplina__turmas');
    }
}
