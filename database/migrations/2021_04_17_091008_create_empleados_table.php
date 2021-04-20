<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            
            $table->string("cedula");
            $table->string("apellido1");
            $table->string("apellido2");
            $table->string("nombre1");
            $table->string("nombre2");
            $table->string("correo");
            $table->string("telcel");
            $table->string("telefono");
            $table->string("telext");
            $table->string("whatsapp");

            $table->bigInteger("cargo_id")->unsigned();
            $table->bigInteger("empresa_id")->unsigned();
            $table->bigInteger("estado_id")->unsigned()->nullable();

            $table->foreign('cargo_id')->references('id')->on('cargos')->constrained();
            $table->foreign('empresa_id')->references('id')->on('companias')->constrained();
            $table->foreign('estado_id')->references('id')->on('estados')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
