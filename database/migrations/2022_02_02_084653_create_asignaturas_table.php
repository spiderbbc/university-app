<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('titulacion_id')->unsigned();
            $table->string("nombre")->nullable(false);
            $table->integer("creditos")->nullable(false);
            $table->string("curso")->nullable(false);
            $table->string("alumnos_max")->nullable(false);
            $table->timestamps();

            $table->foreign('titulacion_id')->references('id')->on('titulacions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
