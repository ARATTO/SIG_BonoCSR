<?php

use Illuminate\Database\Seeder;

class BeneficiarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
             DB::table('beneficiario')->insert([
            'id' => 1,
            'nombre' => "Juan Carlos", 
            'apellidos'=>"Ramos Gonzalez",
            'nombreMadre' => "Ana Maria Gonzalez",
            'nombrePadre'=> "Carlos Jose Ramos",
            'nombreEncargado'=> "Ana Maria Gonzalez",
            'fechaNacimiento'=> "2014-12-02",
            'codigo' => "RG14001",
            'dineroInvertido'=> 15,
            'Canton_id'=> 2,
            'Titular_id'=>2,
            'TipoEstado_id'=>2,
            'genero'=>"M",
            'TipoBono_id'=>2,

            ]);

              DB::table('beneficiario')->insert([
            'id' => 2,
            'nombre' => "Maria Jose", 
            'apellidos'=>"Lopez Perez",
            'nombreMadre' => "Rosaura Perez de Lopez",
            'nombrePadre'=> "Victor Lopez",
            'nombreEncargado'=> "Victor Lopez",
            'fechaNacimiento'=> "2000-03-07",
            'codigo' => "LP00001",
            'dineroInvertido'=> 90,
            'Canton_id'=> 1,
            'Titular_id'=>5,
            'TipoEstado_id'=>2,
            'genero'=>"F",
            'TipoBono_id'=>2,

            ]);

            DB::table('beneficiario')->insert([
            'id' => 3,
            'nombre' => "Bernardo Miguel", 
            'apellidos'=>"Mendez Jovel",
            'nombreMadre' => " Marta Jovel",
            'nombrePadre'=> "Luis Ernesto Mendez Ortiz",
            'nombreEncargado'=> "Luis Ernesto Mendez Ortiz",
            'fechaNacimiento'=> "2009-12-02",
            'codigo' => "MJ09001",
            'dineroInvertido'=>28,
            'Canton_id'=> 3,
            'Titular_id'=>1,
            'TipoEstado_id'=>2,
            'genero'=>"M",
            'TipoBono_id'=>1,

            ]);
                DB::table('beneficiario')->insert([
            'id' => 4,
            'nombre' => "Ariana Melissa", 
            'apellidos'=>"Palacios",
            'nombreMadre' => "Beatriz Palacios",
            'nombrePadre'=> " ",
            'nombreEncargado'=> "Rebeca Palacios",
            'fechaNacimiento'=> "2007-11-06",
            'codigo' => "PP16001",
            'dineroInvertido'=> 56,
            'Canton_id'=> 2,
            'Titular_id'=>4,
            'TipoEstado_id'=>2,
            'genero'=>"F",
            'TipoBono_id'=>2,

            ]);
             DB::table('beneficiario')->insert([
            'id' => 5,
            'nombre' => "Aurelio", 
            'apellidos'=>"Santos Santos",
            'nombreMadre' => "Berta Santos",
            'nombrePadre'=> "Carlos Santos",
            'nombreEncargado'=> "Ana Maria Gonzalez",
            'fechaNacimiento'=> "1934-02-02",
            'codigo' => "SS34001",
            'dineroInvertido'=> 450,
            'Canton_id'=> 3,
            'Titular_id'=>3,
            'TipoEstado_id'=>1,
            'genero'=>"M",
            'TipoBono_id'=>3,

            ]);



    
    }
}
