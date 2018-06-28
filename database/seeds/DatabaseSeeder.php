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
        // La creación de datos de roles debe ejecutarse primero
        $this->call('RoleTableSeeder');
        // Los usuarios necesitarán los roles previamente generados
        $this->call('UserTableSeeder');
        //agregar los roles de involucrados;
        $this->call('rolinvSeeder');
        //agregar los tipos de seguimiento de los expedientes
        $this->call('tiposeguimientoS');
        //agregar los tipos de acuerdos del sistema
        $this->call('acuerdotSeeder');
        //agregr los modulos del sistema
        $this->call('moduloSeeder');
        //agregar los tipos de demanda
        $this->call('tipoexpeSeeder');
        
    }
}
