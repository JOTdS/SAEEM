<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Funcionario::class, function (Faker $faker) {
    return [
        'pessoa_id' => function(){return factory(\App\Pessoa::class)->create( ['is_funcionario' => true, ] )->id;},
        //'escola_id' => function(){return factory(\App\Escola::class)->create()->id;}
    ];
});
