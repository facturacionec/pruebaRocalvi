<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = Estado::create([
            "descripcion" => "Estado",
        ]); 
        $id = Estado::create([
            "descripcion" => "Activo",
            "estado_me_id" => $id->id
        ]); 
        $id = Estado::create([
            "descripcion" => "Inactivo",
            "estado_me_id" => $id->id
        ]); 
    }
}
