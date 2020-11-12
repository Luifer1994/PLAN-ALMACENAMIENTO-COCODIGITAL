<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        //ROLES
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Cliente',
        ]);

        //SEEDER DE ESTADO DE USURIOS
        DB::table('estado_usuarios')->insert([
            'nombre' => 'Activo',
        ]);
        DB::table('estado_usuarios')->insert([
            'nombre' => 'Inactivo',
        ]);

        //SEDER DE PLANES
        DB::table('planes')->insert([
            'nombre' => 'Mensual',
            'descripcion' => 'Este plan te ofrece la posibilidad de guardar tus archivos de una forma segura,
                              el plan guardara tus archivos por un tiempo de 30 dias',
        ]);
        DB::table('planes')->insert([
            'nombre' => 'Semestral',
            'descripcion' => 'Este plan te ofrece la posibilidad de guardar tus archivos de una forma segura,
                              el plan guardara tus archivos por un tiempo de 6 meses',
        ]);
        DB::table('planes')->insert([
            'nombre' => 'Anual',
            'descripcion' => 'Este plan te ofrece la posibilidad de guardar tus archivos de una forma segura,
                              el plan guardara tus archivos por un tiempo de 1 año',
        ]);


        //CREA UN USUARIO admin Y CONTRASEÑA password
         \App\Models\User::factory(1)->create();
    }
}
