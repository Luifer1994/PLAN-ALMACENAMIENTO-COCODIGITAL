<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',130);
            $table->foreignId('id_usuario')->constrained('users');
            $table->foreignId('id_planCliente')->constrained('planes_clientes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
