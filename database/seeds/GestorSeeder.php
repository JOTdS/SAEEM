<?php

use Illuminate\Database\Seeder;

class GestorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Gestor', 50)->create();
    }
}
