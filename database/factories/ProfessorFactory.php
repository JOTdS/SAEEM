<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Professor::class, function (Faker $faker) {
    $formacao = ['Portugues', 'Matematica', 'Ciencias', 'Quimica', 'Historia', 'Geografia'];
    return [
        'formacaoProfessor' => $formacao[$faker->numberBetween(0,5)],
        'funcionario_id' => function(){return factory(\App\Funcionario::class)->create( ['is_professor' => true, ] )->id;}        
    ];
});
