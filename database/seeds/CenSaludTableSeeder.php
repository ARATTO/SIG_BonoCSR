<?php

use Illuminate\Database\Seeder;

class CenSaludTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('centrodesalud')->insert([
        'id' => 1,
        'nombre' => "Unidad Comunitaria de Salud Familiar Apastepeque",
        'nivel' => 1,
        'codigo' => 10 ,
        'detalleDireccion' =>"2ª.Av. Sur, Bo. los Angeles, Apastepeque San Vicente.",
        'Municipio_id' => 5
        ]); 

        DB::table('centrodesalud')->insert([
        'id' => 2,
        'nombre' => "Unidad de Salud Dr.Gustavo Magaña",
        'nivel' => 1,
        'codigo' => 3 ,
        'detalleDireccion' =>"2ª.Av. Norte y 3ª. Calle Oriente, Barrio Santiago Apaneca Ahuachapan casa #22",
        'Municipio_id' => 2
        ]); 

        DB::table('centrodesalud')->insert([
        'id' => 3,
        'nombre' => "Unidad de Salud Ahuachapan",
        'nivel' => 1,
        'codigo' => 2 ,
        'detalleDireccion' =>"4ª. Av. Nte. Y 2ª Calle Pte. Contiguo a Parque Infantil,Ahuachapan",
        'Municipio_id' => 1
        ]); 

        DB::table('centrodesalud')->insert([
        'id' => 4,
        'nombre' => "Unidad de Salud Chalchuapa",
        'nivel' => 1,
        'codigo' => 6 ,
        'detalleDireccion' =>"Repto La Libertad #2, Final Calle El Arado, Chalchuapa,Santa Ana",
        'Municipio_id' => 4
        ]); 

         DB::table('centrodesalud')->insert([
        'id' => 5,
        'nombre' => "Unidad de Salud Candelaria de la Frontera",
        'nivel' => 1,
        'codigo' => 6 ,
        'detalleDireccion' =>"Calle Pincipal, Contiguo a Ex-TELECOM, Bo. Las Animas, Candelaria la Frontera, Santa Ana",
        'Municipio_id' => 3
        ]); 

          DB::table('centrodesalud')->insert([
        'id' => 6,
        'nombre' => "Unidad de Salud Guadalupe",
        'nivel' => 1,
        'codigo' => 12 ,
        'detalleDireccion' =>"Av. Timoteo Lievano y 7ª. Calle Oriente, Bo. Concepción, Guadalupe, San Vicente",
        'Municipio_id' => 6
        ]); 		

    }
}
