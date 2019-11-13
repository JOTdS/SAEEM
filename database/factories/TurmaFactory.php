<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Turma::class, function (Faker $faker) {
  $nome = $faker->unique()->name;
  $modal = ['Creche Infantil Parcial','Creche Infantil Integral',
          'Infantil', 'Ensino Fundamental', 'EJA', 'Quilombola'];
    return [
      'nome' => $nome,
      'modalidade' => $modal[$faker->numberBetween(0,5)],
      'descricao' => $faker->text(150)
    ];
});
