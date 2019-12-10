<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turmas', function (Blueprint $table) {            
            $table->foreign('serie_id')->references('id')->on('series');
            //$table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turmas', function (Blueprint $table) {            
            $table->dropForeign('turmas_serie_id_foreign');
            //$table->dropForeign('turmas_disciplina_id_foreign');
        });
    }
}
