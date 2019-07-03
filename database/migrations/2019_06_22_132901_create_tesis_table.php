<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
              $table->mediumText('autores');
              $table->string('instituto');
              $table->date('fecha');
              $table->longText('resumen');
              $table->string('grado');
              $table->string('documento');
              $table->string('directorio');

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
        Schema::dropIfExists('tesis');
    }
}
