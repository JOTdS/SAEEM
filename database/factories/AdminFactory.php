<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Admin::class, function (Faker $faker) {

    return [
        'usuario_id' => function(){return factory(\App\User::class)->create(['is_adm' => true, 'name'=> 'Teste', 'email'=> 'teste@teste','password'=> password_hash("testeteste", PASSWORD_DEFAULT), ])->id;}
    ];
});
