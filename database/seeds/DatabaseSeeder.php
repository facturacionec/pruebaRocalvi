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
        $this->call(EstadoSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(CompaniaSeeder::class);
        $this->call(EmpleadoSeeder::class);

        
        
    }
}
