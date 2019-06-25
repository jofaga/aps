<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proyecto');
            $table->text('descripcion');
            $table->double('capacidad')->nullable(true);
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->string('ubicacion');
            $table->date('fecha_terminacion');
            $table->timestamps();
        });
    
        Schema::create('tipo_proyecto_proyecto', function (Blueprint $table)
            {
                $table->increments('id');
                $table->integer('tipo_id')->unsigned();
                $table->integer('proyecto_id')->unsigned();
                $table->foreign('tipo_id')->references('id')->on('tipo_proyectos')->onDelete('cascade');
                $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
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
        Schema::dropIfExists('proyectos');
    }
}
