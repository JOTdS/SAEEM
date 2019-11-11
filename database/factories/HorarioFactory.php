<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Horario::class, function (Faker $faker) {

    return [
        'diaDaSemana' => $faker->dayOfWeek,
        'horaInicio' => $fake->time,
        'horaFim' => $fake->time,
        'grade_horario_id' => function(){return factory(\App\Grade_Horario::class)->create()->id;}
    ];
});
