<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('user')->insert([
                'username' => 'Rodrigo Daniel Segovia Romero',
                'email' => 'rodrigoxj32@hotmail.com',
                'password' => bcrypt('fisdl2017'), 
                'esGerencial' => 1,
                'esTransaccional'=> 0,
                'ONG_id' => 1,
                'esAdministrador' => 0,
            ]);     

            DB::table('user')->insert([
                'username' => 'Dario Roman Araya Motto',
                'email' => 'dario_aratto@hotmail.com',
                'password' => bcrypt('fisdl2017'), 
                'esGerencial' => 0,
                'esTransaccional'=> 0,
                'ONG_id' => 1,
                'esAdministrador' => 1,
            ]);     


            DB::table('user')->insert([
                'username' => 'Alejandra Abigail Canizalez Santos',
                'email' => 'alejandra@hotmail.com',
                'password' => bcrypt('fisdl2017'), 
                'esGerencial' => 0,
                'esTransaccional'=> 1,
                'ONG_id' => 1,
                'esAdministrador' => 0,
            ]); 

            DB::table('user')->insert([
                'username' => 'Sharyl Jeannine Mendoza Guardado',
                'email' => 'sharyl@hotmail.com',
                'password' => bcrypt('fisdl2017'), 
                'esGerencial' => 0,
                'esTransaccional'=> 1,
                'ONG_id' => 1,
                'esAdministrador' => 0,
            ]);             



/*
        $faker = Faker::create();

        for ($i = 0; $i < 3; $i ++){
            \DB::table('user')->insert([
            'id' => $i + 1,
            'username' => $faker->firstName.  $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => bcrypt('secret'), 
            'esGerencial' => 1,
            'esTransaccional'=> 0,
            'ONG_id' => 1,
            ]);
    }
      for ($i = 3; $i < 7; $i ++){
            \DB::table('user')->insert([
            'id' => $i + 1,
            'username' => $faker->firstName.  $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => bcrypt('secret'), 
            'esGerencial' => 0,
            'esTransaccional'=> 1,
            'ONG_id' => 1,
            ]);
        }
  }*/

    }
}
