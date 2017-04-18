<?php

use Illuminate\Database\Seeder;

class ChildDiscapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bitacorachilddiscapacitado')->insert([
            'id' => 1,
            'descripcion'=> "octubre 2016 niña de 9 años con problemas auditivos y de habla",
            'Promotor_id'=>1,
            'Beneficiario_id'=>4,

            ]);
        DB::table('bitacorachilddiscapacitado')->insert([
            'id' => 2,
            'descripcion'=> "noviembre 2016 niña de 9 años con problemas auditivos y de habla",
            'Promotor_id'=>1,
            'Beneficiario_id'=>4,

            ]);
        DB::table('bitacorachilddiscapacitado')->insert([
            'id' => 3,
            'descripcion'=> "diciembre 2016 niña de 9 años con problemas auditivos y de habla",
            'Promotor_id'=>1,
            'Beneficiario_id'=>4,

            ]);
        DB::table('bitacorachilddiscapacitado')->insert([
            'id' => 4,
            'descripcion'=> "enero 2017 niña de 9 años con problemas auditivos y de habla",
            'Promotor_id'=>1,
            'Beneficiario_id'=>4,

            ]);
        DB::table('bitacorachilddiscapacitado')->insert([
            'id' => 5,
            'descripcion'=> "febrero 2017 niña de 9 años con problemas auditivos y de habla",
            'Promotor_id'=>1,
            'Beneficiario_id'=>4,

            ]);
    }
}
