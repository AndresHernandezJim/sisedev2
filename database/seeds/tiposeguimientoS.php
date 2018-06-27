<?php

use Illuminate\Database\Seeder;
use App\tiposeguimiento;

class tiposeguimientoS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seg=new tiposeguimiento;
        $seg->tipo=" Demanda creada";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Validado por el Oficial de Partes";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se turna el expediente al Secretario de Acuerdo";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="El expediente se desecha por incompetencia, por lo cual se turna a la autoridad competente ";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="El expediente se desecha art. 31";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="El expediente se admite";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se turna al Actuario para su notificación";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se envía notificación";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se agrega promoción al expediente";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se rechaza la promoción";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se turna a proyectista para elaboración del proyecto";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="En elaboración de proyecto";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Proyecto elaborado, en espera de sentencia";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Sentencia";
        $seg->save();
        $seg=new tiposeguimiento;
        $seg->tipo="Se agrego documento";
        $seg->save();
    }
}
