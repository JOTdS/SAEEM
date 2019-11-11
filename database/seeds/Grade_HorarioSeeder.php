<?php

use Illuminate\Database\Seeder;

class Grade_HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Grade_Horario', 50)->create();
    }
}
