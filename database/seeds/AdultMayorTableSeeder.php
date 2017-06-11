<?php

use Illuminate\Database\Seeder;

class AdultMayorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bitacoraadultomayor')->insert([
            'id' => 1,
            'descripcion'=> "mayo 2015 Persona de 83 años de escazos recursos y sin hijos que cuiden de el",
            'Promotor_id'=>2,
            'Beneficiario_id'=>5,

            ]);
        DB::table('bitacoraadultomayor')->insert([
            'id' => 2,
            'descripcion'=> "noviembre 2015 Persona de 83 años de escazos recursos y sin hijos que cuiden de el",
            'Promotor_id'=>2,
            'Beneficiario_id'=>5,

            ]);
        DB::table('bitacoraadultomayor')->insert([
            'id' => 3,
            'descripcion'=> "mayo 2016 Persona de 83 años de escazos recursos y sin hijos que cuiden de el",
            'Promotor_id'=>2,
            'Beneficiario_id'=>5,

            ]);
    }
}
