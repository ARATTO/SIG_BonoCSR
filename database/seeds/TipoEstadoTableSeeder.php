<?php

use Illuminate\Database\Seeder;

class TipoEstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('tipoestado')->insert([
        'id' => 1,
        'codigo' => 1,
        'nombre' => "Fallecido",
        'descripcion' =>  "Estado en el cual el beneficiario ha fallecido"
        ]); 
           DB::table('tipoestado')->insert([
        'id' => 2,
        'codigo' => 2,
        'nombre' => "Beneficiado",
        'descripcion' =>  "Estado en el cual el beneficiario cumple los requisitos para recibir bono del mes"
        ]);  
             DB::table('tipoestado')->insert([
        'id' => 3,
        'codigo' => 3,
        'nombre' => "Retenido",
        'descripcion' =>  "Estado en el cual el beneficiario ha incumplido con ciertos requisitos para poder recibir el bono en cierto mes"
        ]); 
               DB::table('tipoestado')->insert([
        'id' => 4,
        'codigo' => 4,
        'nombre' => "Terminado",
        'descripcion' =>  "Estado en el cual el beneficiario ha terminado el programa"
        ]); 
    }
}
