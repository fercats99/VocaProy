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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('personalidad1');
            $table->string('personalidad2');
            $table->string('personalidad3');
            $table->string('ambienteLaboral1');
            $table->string('ambienteLaboral2');
            $table->string('ambienteLaboral3');
            $table->string('aptitud1');
            $table->string('aptitud2');
            $table->string('aptitud3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
};
