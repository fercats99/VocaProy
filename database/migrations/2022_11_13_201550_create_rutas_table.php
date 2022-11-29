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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->integer('carrera');
            $table->integer('tipo_carrera');
            $table->integer('personalidad_1');
            $table->integer('personalidad_2');
            $table->integer('personalidad_3');
            $table->integer('ambiente_laboral_1');
            $table->integer('ambiente_laboral_2');
            $table->integer('ambiente_laboral_3');
            $table->integer('aptitud_1');
            $table->integer('aptutud_2');
            $table->integer('aptitud_3');
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
        Schema::dropIfExists('rutas');
    }
};
