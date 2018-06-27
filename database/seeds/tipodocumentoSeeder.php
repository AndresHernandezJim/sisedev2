<?php

use Illuminate\Database\Seeder;
use App\tipodocumento;

class tipodocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	//documentos para oficial de partes
        $doc=new tipodocumento;
        $doc->tipo=" Promoción";
        $doc->rol_usuario=2;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Escritura Pública";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Demanda";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Nombramiento";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Recibo de Nómina";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Resolución";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Boleta de Infracción";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Copia Certificada";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Expediente";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Constancia de Notificación";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Oficio";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Concesión";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Acuerdo";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Sentencia";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Proyecto";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Poder para Pleitos y Cobranzas";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Amparo";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Otros";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Anexos";
        $doc->rol_usuario=2 ;
        $doc->save();
        $doc=new tipodocumento;

        //para secretario de acuerdos
        $doc=new tipodocumento;
        $doc->tipo="Admite";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Contestación";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Requiere";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Desecha";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Incompetencia";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Pruebas y Alegatos";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Termino para Ampliación";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Turnar a Sentencia";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Audiencia de Pruebas y Alegatos";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Requiriendo el Cumplimiento de Sentencia";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Sentencia Cumplida";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Otros";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Promoción";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Escritura Pública";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Demanda";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Nombramiento";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Recibo de Nómina";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Resolución";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Boleta de Infracción";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Copia Certificada";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Expediente";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Constancia de Notificación";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Oficio";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Concesión";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Acuerdo";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Sentencia";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Proyecto";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Poder para Pleitos y Cobranzas";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Amparo";
        $doc->rol_usuario=3 ;
        $doc->save();
        $doc=new tipodocumento;
        $doc->tipo="Acta de Notificación";
        $doc->rol_usuario=3 ;
        $doc->save();
    }
}
