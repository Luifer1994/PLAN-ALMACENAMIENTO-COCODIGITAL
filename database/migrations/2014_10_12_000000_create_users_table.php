<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->char('nombre',30);
        });

        Schema::create('estado_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',15);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',120);
            $table->string('email',60)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('id_rol')->constrained('roles');
            $table->foreignId('id_estadoUsuario')->constrained('estado_usuarios');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('estado_usuarios');
        Schema::dropIfExists('users');
    }
}
