<?php

use Illuminate\Database\Seeder;

class ChildMenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('bitacorachildmenor')->insert([
            'id' => 1,
            'fechaControl'=> "2017-03-02",
            'descripcion'=> "Niño de 3 años de edad, con padres de escasos recursos, quienes no cuentan con un empleo estable, ademas la madre del pequeño sufre de discapacidad",
            'asistio'=> 1,
			'motivoPorNoAsistir' => " ", 
			'padecimientos'=>"Nacimiento Prematuro, mal formacion de sistema oseo",
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>3,
            'Promotor_id'=>2,
            'Beneficiario_id'=>1,

            ]);
    }
}
