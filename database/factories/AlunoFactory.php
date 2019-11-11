<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Aluno::class, function (Faker $faker) {
    return [
        'nascimento' => $faker->date('d-m-Y'),
        'filiacao' => $faker->name,
        'pessoa_id' => function(){return factory(\App\Pessoa::class)->create( ['is_aluno' => true, ] )->id;}
    ];
});
