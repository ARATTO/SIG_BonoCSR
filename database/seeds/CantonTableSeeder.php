<?php

use Illuminate\Database\Seeder;

class CantonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('canton')->insert([
        'id' => 1,
        'codigo' => 1,
        'nombre' => "San Emigdio",
        'esExtremaPobreza' => 10 ,
        'Municipio_id' => 6
        ]); 

         DB::table('canton')->insert([
        'id' => 2,
        'codigo' => 2,
        'nombre' => "Piedra Rajada",
        'esExtremaPobreza' => 10 ,
        'Municipio_id' => 4
        ]); 
         DB::table('canton')->insert([
        'id' => 3,
        'codigo' => 3,
        'nombre' => "Los Magueyes",
        'esExtremaPobreza' => 10 ,
        'Municipio_id' => 1
        ]); 
    }
}
