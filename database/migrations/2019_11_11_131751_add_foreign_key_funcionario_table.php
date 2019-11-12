<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function (Blueprint $table) {            
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            //$table->foreign('escola_id')->references('id')->on('escolas'); //Tem uma tabela para a relação
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionarios', function (Blueprint $table) {            
            $table->dropForeign('funcionarios_pessoa_id_foreign');
            //$table->dropForeign('funcionarios_escola_id_foreign'); //Tem uma tabela para a relação
        });
    }
}
