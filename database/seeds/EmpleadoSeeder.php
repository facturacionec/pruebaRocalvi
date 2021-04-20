<?php

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            "cedula" => "ejemplo_1",
            "apellido1" => "ejemplo_1",
            "apellido2" => "ejemplo_1",
            "nombre1" => "ejemplo_1",
            "nombre2" => "ejemplo_1",
            "correo" => "ejemplo_1",
            "telcel" => "ejemplo_1",
            "telefono" => "ejemplo_1",
            "telext" => "ejemplo_1",
            "whatsapp" => "ejemplo_1",

            "cargo_id" => 1,
            "empresa_id" => 1,
            "estado_id" => 2,            
        ]);
        Empleado::create([
            "cedula" => "ejemplo_2",
            "apellido1" => "ejemplo_2",
            "apellido2" => "ejemplo_2",
            "nombre1" => "ejemplo_2",
            "nombre2" => "ejemplo_2",
            "correo" => "ejemplo_2",
            "telcel" => "ejemplo_2",
            "telefono" => "ejemplo_2",
            "telext" => "ejemplo_2",
            "whatsapp" => "ejemplo_2",

            "cargo_id" => 1,
            "empresa_id" => 1,
            "estado_id" => 2,            
        ]);
        Empleado::create([
            "cedula" => "ejemplo_3",
            "apellido1" => "ejemplo_3",
            "apellido2" => "ejemplo_3",
            "nombre1" => "ejemplo_3",
            "nombre2" => "ejemplo_3",
            "correo" => "ejemplo_3",
            "telcel" => "ejemplo_3",
            "telefono" => "ejemplo_3",
            "telext" => "ejemplo_3",
            "whatsapp" => "ejemplo_3",

            "cargo_id" => 1,
            "empresa_id" => 1,
            "estado_id" => 2,            
        ]);
    }
}
