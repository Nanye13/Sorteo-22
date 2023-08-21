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
    // DESARROLLO 
// Desarrolladora: Nancy Yesenia Ojeda Perez
// Desarrollo Direccion de Tecnologias
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_empleado');
            $table->string('nombre_empleado');
            $table->string('direccion');
            $table->string('puesto');
            $table->char('ganador',1);
            $table->char('especial',1)->nullable();
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
