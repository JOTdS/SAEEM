<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTurmaSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turma__series', function (Blueprint $table) {            
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->foreign('serie_id')->references('id')->on('series');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turma__series', function (Blueprint $table) {            
            $table->dropForeign('turma__series_turma_id_foreign');
            $table->dropForeign('turma__series_serie_id_foreign');
        });
    }
}
