<?php

use Illuminate\Database\Seeder;
use App\rolinv;

class rolinvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $rol=new rolinv;
       $rol->tipo="Demandado";
       $rol->save();
       $rol=new rolinv;
       $rol->tipo="Demandante";
       $rol->save();
       $rol=new rolinv;
       $rol->tipo="involucrado";
       $rol->save();
    }
}
