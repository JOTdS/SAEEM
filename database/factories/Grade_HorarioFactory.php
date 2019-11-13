<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Grade_Horario::class, function (Faker $faker) {

    return [
        'descricao' => $faker->text(190),
        'disciplina_id' => function(){return factory(\App\Disciplina::class)->create()->id;}
    ];
});
