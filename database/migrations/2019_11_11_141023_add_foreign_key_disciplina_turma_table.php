<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDisciplinaTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplina__turmas', function (Blueprint $table) {            
            $table->foreign('turma_id')->references('id')->on('turmas');
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
        Schema::table('disciplina__turmas', function (Blueprint $table) {            
            $table->dropForeign('disciplina__turmas_turma_id_foreign');
            $table->dropForeign('disciplina__turmas_disciplina_id_foreign');
        });
    }
}
