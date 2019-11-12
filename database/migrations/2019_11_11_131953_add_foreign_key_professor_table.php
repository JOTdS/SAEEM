<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professors', function (Blueprint $table) {            
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
        Schema::table('professors', function (Blueprint $table) {            
            $table->dropForeign('professors_funcionario_id_foreign');
            $table->dropForeign('professors_escola_id_foreign');
        });
    }
}
