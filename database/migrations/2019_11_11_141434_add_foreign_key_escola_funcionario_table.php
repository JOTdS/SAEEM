<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyEscolaFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escola__funcionarios', function (Blueprint $table) {            
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->foreign('escola_id')->references('id')->on('escolas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escola__funcionarios', function (Blueprint $table) {            
            $table->dropForeign('escola__funcionarios_funcionario_id_foreign');
            $table->dropForeign('escola__funcionarios_escola_id_foreign');
        });
    }
}
