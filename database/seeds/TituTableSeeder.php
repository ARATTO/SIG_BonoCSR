<?php

use Illuminate\Database\Seeder;

class TituTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 DB::table('titular')->insert([
        'id' => 1,
        'codigo' => 1,
        'nombre' => "Luis Ernesto",
        'apellido' => "Mendez Ortiz",
        'dui' =>  "00234343-2",
        'sabeLeer' => 10,
        'sabeEscribir' => 10,
        'fechaNacimiento' => "1960-03-24",
        'genero' => "M"
        ]);
    	  DB::table('titular')->insert([
        'id' => 2,
        'codigo' => 2,
        'nombre' => "Maria Esther",
        'apellido' => "Abrego Palacios",
        'dui' =>  "02333567-3",
        'sabeLeer' => 10,
        'sabeEscribir' => 10,
        'fechaNacimiento' => "1955-10-12",
        'genero' => "F"
        ]);
    	   DB::table('titular')->insert([
        'id' => 3,
        'codigo' => 3,
        'nombre' => "Jose ",
        'apellido' => "Castaneda Castro",
        'dui' =>  "01299043-4",
        'sabeLeer' => 10,
        'sabeEscribir' => 10,
        'fechaNacimiento' => "1965-12-30",
        'genero' => "M"
        ]);
    	   DB::table('titular')->insert([
        'id' => 4,
        'codigo' => 4,
        'nombre' => "Wilfredo Arnoldo",
        'apellido' => "Velasquez Marroquin",
        'dui' =>  "03201234-6",
        'sabeLeer' => 10,
        'sabeEscribir' => 10,
        'fechaNacimiento' => "1967-03-30",
        'genero' => "M"
        ]);
    	 DB::table('titular')->insert([
        'id' => 5,
        'codigo' => 5,
        'nombre' => "Sara Elizabeth",
        'apellido' => "Campos Castaneda",
        'dui' =>  "0234510-6",
        'sabeLeer' => 10,
        'sabeEscribir' => 10,
        'fechaNacimiento' => "1965-12-02",
        'genero' => "F"
        ]);  
    }
}
