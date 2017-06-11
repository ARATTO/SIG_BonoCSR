<?php

use Illuminate\Database\Seeder;
use  Faker\Factory as faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
  }

}
