<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisTableSeeder::class);
        $this->call(DeptoTableSeeder::class);
<<<<<<< HEAD
        $this->call(MuniTableSeeder::class);
        $this->call(TituTableSeeder::class);
        $this->call(TipoBonoTableSeeder::class);
        $this->call(TipoEstadoTableSeeder::class);
        $this->call(OngTableSeeder::class);
        $this->call(CantonTableSeeder::class);
        $this->call(EscuelaTableSeeder::class);
        $this->call(CenSaludTableSeeder::class);
=======
        //$this->call(MuniTableSeeder::class);
       // $this->call(TituTableSeeder::class);
        $this->call(TipoBonoTableSeeder::class);
        $this->call(TipoEstadoTableSeeder::class);
        $this->call(OngTableSeeder::class);
        //$this->call(CantonTableSeeder::class);
        //$this->call(EscuelaTableSeeder::class);
        //$this->call(CenSaludTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(BeneficiarioTableSeeder::class);
        //$this->call(PromoTableSeeder::class);
        //$this->call(ChildMenTableSeeder::class);
        //$this->call(EmbarazadaTableSeeder::class);
        //$this->call(AdultMayorTableSeeder::class);
        //$this->call(ChildDiscapTableSeeder::class);
        //$this->call(ChildEstudianteTableSeeder::class);
        //$this->call(BonoTableSeeder::class);
>>>>>>> bbaf77a46e37dae5da64c2cec21eb118e95d4a26
    }
}
