<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Gestor::class, function (Faker $faker) {
    return [
        'formacaoGestor' => "sdasda",
        'funcionario_id' => function(){return factory(\App\Funcionario::class)->create( ['is_gestor' => true, ] )->id;}
    ];
});
