<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Tecnico::class, function (Faker $faker) {

    $cargo = ['Zelador', 'Cozinheiro', 'Coordenador', 'Serviços Gerais',
        'Agente Administrativo', 'Administrativo', 'Porteiro', 'Inspetor'];

    return [
        'cargo' => $cargo[$faker->numberBetween(0,7)],
        'funcionario_id' => function(){return factory(\App\Funcionario::class)->create( ['is_tecnico' => true, ] )->id;}
        // 'escola_id' => function(){return factory(\App\Escola::class)->create()->id;}
    ];
});
