<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Serie::class, function (Faker $faker) {

  $posicaoNumeros = ['1', '2', '3', '4', '5'];
  $ano = ['ª Serie ', 'º Ano ', ];
  $modalidade = ['Ensino Regular', 'EJA', ];
  $escolas = \App\Escola::All();

    return [
        'descricao' => $faker->text(190),
        'modalidade' => $modalidade[$faker->numberBetween(0,1)],
        'nome' => $posicaoNumeros[$faker->numberBetween(0,4)].$ano[$faker->numberBetween(0,1)],
        'escola_id' => $escolas[$faker->numberBetween(0,count($escolas)-1)]->id
    ];
});
