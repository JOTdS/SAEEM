<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFrequenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frequencias', function (Blueprint $table) {
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frequencias', function (Blueprint $table) {
            $table->dropForeign('frequencias_aluno_id_foreign');
            $table->dropForeign('frequencias_disciplina_id_foreign');
        });
    }
}
