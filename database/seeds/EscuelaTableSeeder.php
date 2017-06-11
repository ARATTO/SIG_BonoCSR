<?php

use Illuminate\Database\Seeder;

class EscuelaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('escuela')->insert([
        'id' => 1,
        'nombre' => "Centro Escolar Caserio San Alberto",
        'codigo' => 1,
        'detalleDireccion' => "Caserio San Alberto, canton Piedra Rajada,Chalchuapa, Santa Ana",
        'Canton_id' => 2
        ]); 
          DB::table('escuela')->insert([
        'id' => 2,
        'nombre' => "Centro Escolar Canton San Emigdio",
        'codigo' => 2,
        'detalleDireccion' => "Final Calle principal 2 cuadras al Sur de la Iglesia Catolica,San Emigdio",
        'Canton_id' => 1
        ]); 
        DB::table('escuela')->insert([
        'id' => 3,
        'nombre' => "Centro Escolar Canton Los Magueyes",
        'codigo' => 3,
        'detalleDireccion' => "Canton los Magueyes,calle que conduce a geotermica Ahuachapan",
        'Canton_id' => 3
        ]); 
    }
}
