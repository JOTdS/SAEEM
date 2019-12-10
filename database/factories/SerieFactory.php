<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Serie::class, function (Faker $faker) {

  $posicaoNumeros = ['1', '2', '3', '4', '5'];
  $modalidade = ['ª Serie ', 'º Ano ', ];
    return [
        'descricao' => $faker->text(190),
        'modalidade' => $posicaoNumeros[$faker->numberBetween(0,4)].$modalidade[$faker->numberBetween(0,1)],
        'escola_id' => function(){return factory(\App\Escola::class)->create()->id;}
    ];
});
