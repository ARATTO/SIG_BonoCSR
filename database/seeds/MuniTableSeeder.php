<?php

use Illuminate\Database\Seeder;

class MuniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipio')->insert([
        	'id' => 1,
        	'codigo' => '0101',
        	'nombre' => 'Ahuachapan',
        	'Departamento_id' => 1
        	]);
        DB::table('municipio')->insert([
        	'id' => 2,
        	'codigo' => '0102',
        	'nombre' => 'Apaneca',
        	'Departamento_id' => 1
        	]);
        DB::table('municipio')->insert([
        	'id' => 3,
        	'codigo' => '0201',
        	'nombre' => 'Candelaria de la Frontera',
        	'Departamento_id' => 2
        	]);
        DB::table('municipio')->insert([
        	'id' => 4,
        	'codigo' => '0202',
        	'nombre' => 'Chalchuapa',
        	'Departamento_id' => 2
        	]);
        DB::table('municipio')->insert([
        	'id' => 5,
        	'codigo' => '1001',
        	'nombre' => 'Apastepeque',
        	'Departamento_id' => 10
        	]);
        DB::table('municipio')->insert([
        	'id' => 6,
        	'codigo' => '1002',
        	'nombre' => 'Guadalupe',
        	'Departamento_id' => 10
        	]);
    }
}
