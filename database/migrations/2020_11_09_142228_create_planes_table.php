<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesTable extends Migration
{
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('descripcion');
        });

        Schema::create('planes_clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_plan')->constrained('planes');
            $table->foreignId('id_usuario')->constrained('users');
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planes');
        Schema::dropIfExists('planes_clientes');
    }
}
