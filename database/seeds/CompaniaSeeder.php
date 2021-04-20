<?php

use App\Compania as compania;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        
        compania::create([
            "ruc" => "0921197067",
            "razon_social" => "Razon social 1",
            "estado_id" => 2,
        ]); 
        compania::create([
            "ruc" => "0921197047",
            "razon_social" => "Razon social 2",
            "estado_id" => 2,
        ]); 
        compania::create([
            "ruc" => "0921197037",
            "razon_social" => "Razon social 3",
            "estado_id" => 2,
        ]);  
    }
}
