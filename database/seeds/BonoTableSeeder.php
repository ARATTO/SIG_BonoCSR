<?php

use Illuminate\Database\Seeder;

class BonoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bono')->insert([
            'id' => 1,
            'dineroAcumulado'=> 15,
            'fechaInicioPeriodo'=> "2016-06-15",
            'fechaFinPeriodo'=> "2016-07-15",
            'periodoFinalizo' => 1 , 
            'BitacoraEmbarazada_id'=> 1 ,
            'BitacoraChildMenor_id'=>  1,
            'BitacoraAdultoMayor_id'=> 1,
            'BitacoraChildDiscapacitado_id'=> 1 ,
            'BitacoraChildEstudiante_id'=> 1 ,

            ]);
    }
}
