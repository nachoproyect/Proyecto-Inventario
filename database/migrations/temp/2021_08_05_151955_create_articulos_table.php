<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
           $table->increments('id');
            //Campo para conectarse con la tabla categorias
            $table->integer('categoria_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->string('puesto', 70);
            $table->string('ip', 70);
            $table->integer('marca_id')->unsigned();
            $table->string('serial', 70);
            $table->string('estante', 70);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('descripcion', 256)->nullable();

            $table->timestamps();

            //Clave foranea
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->foreign('marca_id')->references('id')->on('marcas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}