<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Escola::class, function (Faker $faker) {
    $tipo = ['kilombola', 'municipal', 'distrital'];
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text(190),
        'endereco' => $faker->address,
        'telefone' => $faker->tollFreePhoneNumber,
        'modalidade' => $tipo[$faker->numberBetween(0,2)],
        'inep' => $faker->numberBetween(10000000, 99999999)
        // 'id_gestor' => function(){return factory(\App\Gestor::class)->create()->id;},
        // 'id_professor' => function(){return factory(\App\Professor::class)->create()->id;},
        // 'id_funcionario' => function(){return factory(\App\Funcionario::class)->create()->id;},
    ];
});
