<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicantes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('Apellidos');
            $table->string('correo')->nullable();
            $table->string('telefono')->unique();
            $table->string('procedencia');
            $table->string('carrera');
            $table->bigInteger('oficina_id')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->foreign('oficina_id')->references('id')->on('oficinas');
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
        Schema::dropIfExists('practicantes');
    }
};
