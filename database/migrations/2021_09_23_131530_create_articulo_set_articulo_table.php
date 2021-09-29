<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloSetArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_set_articulo', function (Blueprint $table) {
            
            $table->increments('id');
           // $table->id();

           $table->integer('set_articulo_id')->unsigned();
           $table->integer('articulo_id')->unsigned();
           
          // $table->unsignedBigInteger('articulo_id');
          // $table->unsignedBigInteger('set_articulo_id');
        
           $table->timestamps();

           
           $table->foreign('articulo_id')->references('id')->on('articulos');
           $table->foreign('set_articulo_id')->references('id')->on('set_articulos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo_set_articulo');
    }
}
