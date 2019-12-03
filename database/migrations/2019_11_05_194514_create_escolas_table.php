<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nome', 200);
            $table->text('descricao', 190)->nullable();
            $table->text('endereco', 200)->nullable;
            $table->text('telefone')->unique();
            $table->text('modalidade');
            //$table->bigInteger('gestor_id'); //Add Key
            $table->integer('inep');
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
        Schema::dropIfExists('escolas');
    }
}
