<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Turma::class, function (Faker $faker) {
  $nome = $faker->unique()->name;
  $posicaoLetras = [' A', ' B', ' C',' D'];
  $series = \App\Serie::All();
    return [
      'nome' => $nome,
      'modalidade' => $posicaoLetras[$faker->numberBetween(0,3)],
      'descricao' => $faker->text(150),
      'serie_id' => $series[$faker->numberBetween(0,count($series)-1)]->id
    ];
});
