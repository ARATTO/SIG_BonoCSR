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
<<<<<<< HEAD
        $this->call(PaisTableSeeder::class);
        $this->call(DeptoTableSeeder::class);

        $this->call(MuniTableSeeder::class);
        $this->call(TituTableSeeder::class);
        $this->call(TipoBonoTableSeeder::class);
        $this->call(TipoEstadoTableSeeder::class);
        $this->call(OngTableSeeder::class);
        $this->call(CantonTableSeeder::class);
        $this->call(EscuelaTableSeeder::class);
        $this->call(CenSaludTableSeeder::class);

=======
        //$this->call(PaisTableSeeder::class);
        //$this->call(DeptoTableSeeder::class);
        
>>>>>>> 3d179c05a9af55d8f1c1c9a80a7a6b62590ed998
        //$this->call(MuniTableSeeder::class);
       // $this->call(TituTableSeeder::class);
        
        //$this->call(TipoBonoTableSeeder::class);
        //$this->call(TipoEstadoTableSeeder::class);
        //$this->call(OngTableSeeder::class);

        //$this->call(CantonTableSeeder::class);
        //$this->call(EscuelaTableSeeder::class);
        //$this->call(CenSaludTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        //$this->call(BeneficiarioTableSeeder::class);
        //$this->call(PromoTableSeeder::class);
        //$this->call(ChildMenTableSeeder::class);
        //$this->call(EmbarazadaTableSeeder::class);
        //$this->call(AdultMayorTableSeeder::class);
        //$this->call(ChildDiscapTableSeeder::class);
        //$this->call(ChildEstudianteTableSeeder::class);
        //$this->call(BonoTableSeeder::class);

    }
}
