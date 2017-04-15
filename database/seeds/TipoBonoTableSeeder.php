<?php

use Illuminate\Database\Seeder;

class TipoBonoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipobono')->insert([
        'id' => 1,
        'codigo' => 1,
        'nombre' => "Educacion",
        'cantidad' => 15,
        'descripcion' =>  "Bono brindado a niños de escasos recursos que se encuentran estudiando"
        ]);  
        DB::table('tipobono')->insert([
        'id' => 2,
        'codigo' => 2,
        'nombre' => "Salud",
        'cantidad' => 15,
        'descripcion' =>  "Bono brindado a niños y mujeres embarazadas de escasos recursos"
        ]);   
        DB::table('tipobono')->insert([
        'id' => 3,
        'codigo' => 3,
        'nombre' => "Adulto mayor",
        'cantidad' => 15,
        'descripcion' =>  "Bono brindado al adulto mayor de escasos recursos"
        ]); 
    }
}
