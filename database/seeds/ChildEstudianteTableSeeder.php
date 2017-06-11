<?php

use Illuminate\Database\Seeder;

class ChildEstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('bitacorachildestudiante')->insert([
            'id' => 1,
            'inasistenciaInjustificada'=> 0,
            'motivoPorInasistencias' => " ",
            'dineroInvertido'=> 15,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
          DB::table('bitacorachildestudiante')->insert([
            'id' => 2,
            'inasistenciaInjustificada'=> 3,
            'motivoPorInasistencias' => "Enfermedad sin justificacion",
            'dineroInvertido'=> 14,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
          DB::table('bitacorachildestudiante')->insert([
            'id' => 3,
            'inasistenciaInjustificada'=> 0,
            'motivoPorInasistencias' => " ",
            'dineroInvertido'=> 15,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
          DB::table('bitacorachildestudiante')->insert([
            'id' => 4,
            'inasistenciaInjustificada'=> 6,
            'motivoPorInasistencias' => "Viaje repetino a otro departamento para trabajar en las cortas",
            'dineroInvertido'=> 13,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
          DB::table('bitacorachildestudiante')->insert([
            'id' => 5,
            'inasistenciaInjustificada'=> 2,
            'motivoPorInasistencias' => "Enfermedad sin justificacion ",
            'dineroInvertido'=> 14,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
          DB::table('bitacorachildestudiante')->insert([
            'id' => 6,
            'inasistenciaInjustificada'=> 3,
            'motivoPorInasistencias' => " Sin justificacion",
            'dineroInvertido'=> 13,
            'Escuela_id'=>3,
            'Promotor_id'=>3,
            'Beneficiario_id'=>3,

            ]);
    }
}
