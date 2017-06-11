<?php

use Illuminate\Database\Seeder;

class OngTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('ong')->insert([
        'id' => 1,
        'descripcion' => "Institución gubernamental de El Salvador encargada de ejecutar proyectos sociales en el marco del Sistema de Protección Social Universal.",
        'detalleDireccion' => "Boulevard Orden de Malta, #470. Urbanización Santa Elena, Antiguo Cuscatlán, La Libertad y 10a. Avenida Sur y Calle México, Barrio San Jacinto, San Salvador.",
        'mision' =>  "Mejorar la calidad de vida de las personas en condición de pobreza y vulnerabilidad impulsando procesos de desarrollo local sostenible.",
        'vision' => "Ser la institución referente en la implementación de iniciativas para el desarrollo local."
        ]); 
    }
}
