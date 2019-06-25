<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdificiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('calle');
            $table->string('colonia')->nullable();
            $table->string('cp')->nullable();
            $table->string('ciudad');
            $table->string('estado')->default('Jalisco');
            $table->string('pais')->default('México');
            $table->string('horario');
            $table->boolean('contacto')->default(false);
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
        Schema::dropIfExists('edificios');
    }
}
