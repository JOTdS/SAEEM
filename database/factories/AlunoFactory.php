<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Aluno::class, function (Faker $faker) {
    return [
        
        'nascimento' => $faker->dateTimeBetween('-20 years','-2 years'),
        'filiacao' => $faker->name,
        'pessoa_id' => function(){return factory(\App\Pessoa::class)->create( ['is_aluno' => true, ] )->id;}
    ];
});
