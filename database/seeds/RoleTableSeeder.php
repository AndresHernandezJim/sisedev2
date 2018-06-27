<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	$role= new Role();
    	$role->nombre="Administrador";
    	$role->descripcion="Administrador del sistema";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Oficial de Partes";
    	$role->descripcion="Oficial del partes";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Secretario de Acuerdos";
    	$role->descripcion="Secretario de acuerdos en la demanda";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Proyectista";
    	$role->descripcion="Proyectista de sentencias";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Actuario";
    	$role->descripcion="Actuario de acuerdos";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Magistrado";
    	$role->descripcion="Magistrado administrador del sistema";
    	$role->save();

    	$role= new Role();
    	$role->nombre="Usuario";
    	$role->descripcion="Usuario del sistema";
    	$role->save();

    	$role= new role();
    	$role->nombre="Amparos";
    	$role->descripcion="Cotejador de amparos";
    	$role->save();
    	
    	$role= new Role();
    	$role->nombre="Institución";
    	$role->descripcion="Institución publica ";
    	$role->save();
    }
}
