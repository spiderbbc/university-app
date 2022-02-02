<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula__asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matricula_id')->constrained();
            $table->unsignedBigInteger('asignatura_id')->constrained();
            $table->timestamps();
            // foreigns key
            $table->foreign('matricula_id')->references('id')->on('matriculas')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula__asignaturas');
    }
}
