<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDisciplinaProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplina__professors', function (Blueprint $table) {
            $table->foreign('professor_id')->references('id')->on('professors');
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
        Schema::table('disciplina__professors', function (Blueprint $table) {
            $table->dropForeign('disciplina__professors_professor_id_foreign');
            $table->dropForeign('disciplina__professors_disciplina_id_foreign');
        });
    }
}
