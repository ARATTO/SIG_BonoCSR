<?php

use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais')->insert([
        	'id' => 1,
        	'codigo' => '503',
        	'nombre' => 'El Salvador'

        	]);
        	
    } 
}
