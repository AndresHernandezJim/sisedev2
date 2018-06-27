<?php

use Illuminate\Database\Seeder;
use App\tipoexpediente;
class tipoexpeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $e=new tipoexpediente;
       $e->tipo="Nulidad";
       $e->save();
       $e=new tipoexpediente;
       $e->tipo="Resoponsabilidad Patrimonial";
       $e->save();
       $e=new tipoexpediente;
       $e->tipo="Afirmativa Ficta";
       $e->save();
       $e=new tipoexpediente;
       $e->tipo="Negativa Ficta";
       $e->save();
       $e=new tipoexpediente;
       $e->tipo="Responsabilidad Administrativa Grave";
       $e->save();
    }
}
