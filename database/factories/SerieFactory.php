<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Serie::class, function (Faker $faker) {
    $modalidade = ['jardim 01', 'jardim 02', 'infantil', 'fundamental 01', 'fundamental 02'];
    return [
        'descricao' => $faker->text(190),
        'modalidade' => $modalidade[$faker->numberBetween(0,4)],
        'escola_id' => function(){return factory(\App\Escola::class)->create()->id;}
    ];
});
