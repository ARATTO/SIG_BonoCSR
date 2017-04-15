<?php

use Illuminate\Database\Seeder;

class DeptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamento')->insert([
        	'id' => 1,
        	'nombre' => 'Ahuachapan',
        	'codigo' => '01',
        	'Pais_id' => 1

        	]);
         DB::table('departamento')->insert([
        	'id' => 2,
        	'nombre' => 'Santa Ana',
        	'codigo' => '02',
        	'Pais_id' => 1	
        	]);

         DB::table('departamento')->insert([
        	'id' => 3,
        	'nombre' => 'Sonsonate',
        	'codigo' => '03',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 4,
        	'nombre' => 'Chalatenango',
        	'codigo' => '04',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 5,
        	'nombre' => 'La Libertad',
        	'codigo' => '05',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 6,
        	'nombre' => 'San Salvador',
        	'codigo' => '06',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 7,
        	'nombre' => 'Cuscatlan',
        	'codigo' => '07',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 8,
        	'nombre' => 'La Paz',
        	'codigo' => '08',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 9,
        	'nombre' => 'Cabañas',
        	'codigo' => '09',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 10,
        	'nombre' => 'San Vicente',
        	'codigo' => '10',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 11,
        	'nombre' => 'Usulutan',
        	'codigo' => '11',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 12,
        	'nombre' => 'San Miguel',
        	'codigo' => '12',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 13,
        	'nombre' => 'Morazan',
        	'codigo' => '13',
        	'Pais_id' => 1	
        	]);	
         DB::table('departamento')->insert([
        	'id' => 14,
        	'nombre' => 'La Union',
        	'codigo' => '14',
        	'Pais_id' => 1	
        	]);	
    }
}








									