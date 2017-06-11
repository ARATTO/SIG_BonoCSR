<?php

use Illuminate\Database\Seeder;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('promotor')->insert([
            'id' => 1,
            'codigo' => "PR001",
            'nombre' => "Mayra Areli", 
            'apellido'=>"Chavez Gutierrez",
            'salario'=> 500,
            'dui' => "05015382-3",
            'nit'=> "02360408608988",
            'genero'=>"F",
            'fechaNacimiento'=> "1960-08-04",
            'ONG_id'=>1,

            ]);
          DB::table('promotor')->insert([
            'id' => 2,
            'codigo' => "PR002",
            'nombre' => "Alicia Mary", 
            'apellido'=>"Sosa Vaquez",
            'salario'=> 450,
            'dui' => "05315982-1",
            'nit'=> "02381306871768",
            'genero'=>"F",
            'fechaNacimiento'=> "1987-06-13",
            'ONG_id'=>1,

            ]);
          DB::table('promotor')->insert([
            'id' => 3,
            'codigo' => "PR003",
            'nombre' => "Carlos Miguel", 
            'apellido'=>"Mejia Marin",
            'salario'=> 300,
            'dui' => "05467382-5",
            'nit'=> "02381610901768",
            'genero'=>"M",
            'fechaNacimiento'=> "1990-10-16",
            'ONG_id'=>1,

            ]);
    }
}
