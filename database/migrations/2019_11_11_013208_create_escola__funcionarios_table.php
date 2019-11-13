<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escola__funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dataEntrada');
            $table->date('dataSaida');
            $table->bigInteger('funcionario_id'); //Descomentando
            $table->bigInteger('escola_id');
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
        Schema::dropIfExists('escola__funcionarios');
    }
}
