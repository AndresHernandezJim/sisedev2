<?php

use Illuminate\Database\Seeder;
Use App\modulo;

class moduloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $m=new modulo;
       $m->modulo='Ciudadano';
       $m->descripcion="Usuarios Externos al Sistema";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Oficialía de Partes';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Secretaría de acuerdos';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Actuarios';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Proyectos de Sentencias';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Magistrado';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Amparos';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
       $m=new modulo;
       $m->modulo='Administrador del sistema';
       $m->descripcion="Usuarios Internos";
       $m->fecha=date('Y-m-d H:i:s');
       $m->save();
    }
}
