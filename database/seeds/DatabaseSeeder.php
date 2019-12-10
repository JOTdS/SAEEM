<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AlunoSeeder::class);
        $this->call(EscolaSeeder::class);
        // $this->call(GestorSeeder::class);
        // $this->call(ProfessorSeeder::class);
        // $this->call(TecnicoSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(TurmaSeeder::class);
        // $this->call(DisciplinaSeeder::class);
        // $this->call(Grade_HorarioSeeder::class);
        // $this->call(HorarioSeeder::class);

    }
}
