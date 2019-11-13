<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplinas', function (Blueprint $table) {
            //$table->foreign('aluno_id')->references('id')->on('alunos');           //ja tem uma tabela para isso
            //$table->foreign('professor_id')->references('id')->on('professors');   //ja tem uma tabela para isso
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplinas', function (Blueprint $table) {
            //$table->dropForeign('disciplinas_aluno_id_foreign');       //ja tem uma tabela para isso
            //$table->dropForeign('disciplinas_professor_id_foreign');  //ja tem uma tabela para isso
        });
    }
}
