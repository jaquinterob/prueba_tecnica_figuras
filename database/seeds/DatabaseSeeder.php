<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_figuras')->insert([
            "nombre" => "Triángulo",
            "lados" => "3",
            "descripcion" => "Se llama triángulo o trígono, en geometría plana, al polígono de tres lados. Los puntos comunes a cada par de lados se denominan vértices del triángulo.​"
        ]);

        DB::table('subtipos_figuras')->insert([
            "nombre" => "Equilátero",
            "tipo" => "Triángulo"
        ]);
    }
}
