<?php

use Illuminate\Database\Seeder;

class EmbarazadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bitacoraembarazada')->insert([
            'id' => 1,
            'fechaControl'=> "2016-06-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
          DB::table('bitacoraembarazada')->insert([
            'id' => 2,
            'fechaControl'=> "2016-07-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 0,
			'motivoPorNoAsistir' => "injustificado, falto a cada uno de los examenes y consultas", 
			'dineroInvertido'=> 0,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
           DB::table('bitacoraembarazada')->insert([
            'id' => 3,
            'fechaControl'=> "2016-08-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
            DB::table('bitacoraembarazada')->insert([
            'id' => 4,
            'fechaControl'=> "2016-09-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
             DB::table('bitacoraembarazada')->insert([
            'id' => 5,
            'fechaControl'=> "2016-10-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
              DB::table('bitacoraembarazada')->insert([
            'id' => 6,
            'fechaControl'=> "2016-11-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
               DB::table('bitacoraembarazada')->insert([
            'id' => 7,
            'fechaControl'=> "2016-12-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 0,
			'motivoPorNoAsistir' => " injustificados", 
			'dineroInvertido'=> 0,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
                DB::table('bitacoraembarazada')->insert([
            'id' => 8,
            'fechaControl'=> "2017-01-15",
            'descripcion'=> "Adolecente embarazada de escasos recursos, sin ayuda economica del presunto padre",
            'asistioControl'=> 1,
			'motivoPorNoAsistir' => " ", 
			'dineroInvertido'=> 15,
            'CentroDeSalud_id'=>6,
            'Promotor_id'=>1,
            'Beneficiario_id'=>2,

            ]);
    }
}
