<?php

use App\Cargo as cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        cargo::create([
            "descripcion" => "cargo 1",
            "estado_id" => 2
        ]); 
        cargo::create([
            "descripcion" => "cargo 2",
            "estado_id" => 2
        ]); 
        cargo::create([
            "descripcion" => "cargo 3",
            "estado_id" => 2
        ]); 
    }
}
