<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Disciplina::class, function (Faker $faker) {

    return [
        'nome' => $faker->name,
        'descricao' => $faker->text(190)
    ];
});
