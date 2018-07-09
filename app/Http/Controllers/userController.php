<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\queryhelper;
use App\Helper\filehelper;
use App\expediente;
use App\mensajes;
use App\seguimiento;
use App\anexo;
use App\envios;
use App\involucrados;
class userController extends Controller
{
    public function index(Request $request){ //carga de pagina inicial del usuario
    	$id=$request->session()->get('id');
    	$ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
    	$data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
        );
    	return view('home',$data);
    }
    public function perfil(Request $request){ //cargar la visualizacion de perfil del usuario
    	if($_POST){
    		$id=$request->session()->get('id');
    		//dd($request->all());
    		$con=$request->contra;
    		$ema=$request->email;
    		$us=\DB::table('users')->where('id',$id)->first();
    		if($request->hasFile('foto')){$archivo=1;}else{$archivo=0;}
    		if($ema==$request->email){ //actualizamos los datos de la tabla users
    			if($archivo==1){
                    if($con==null){
                        $imagen=$request->file('foto');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'avatar'=>$avatar]);
                    }else{
                        $imagen=$request->file('foto');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'password'=>bcrypt($request->contra),'avatar'=>$avatar]);
                    }
                }else{
                    if($con==null){
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'avatar'=>$avatar]);
                    }else{
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'password'=>bcrypt($request->contra),'avatar'=>$avatar]);
                    }  
                }
    		}else{// actualizamos el email
    			if($archivo==1){
                    if($con==null){
                        $imagen=$request->file('foto');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'avatar'=>$avatar]);
                    }else{
                        $imagen=$request->file('foto');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'password'=>bcrypt($request->contra),'avatar'=>$avatar]);
                    }
                }else{
                    if($con==null){
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'avatar'=>$avatar]);
                    }else{
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)->update(['nombre'=>$request->nombre,'a_paterno'=>$request->a_p,'a_materno'=>$request->a_m,'password'=>bcrypt($request->contra),'avatar'=>$avatar]);
                    }    
                }
    		}
    		//actualizar tabla persona
    		$p=\DB::table('persona')->where('user_id',$id)->update(['telefono'=>$request->tel,'celular'=>$request->cel,'razon_social'=>$request->razon_social]);
    		//actualizar tabla dom
    		if($request->ref==null){
    			$d=\DB::table('domicilio')->where('user_id',$id)->where('oir',1)->update(['calle'=>$request->calle,'ninter'=>$request->nint,'next'=>$request->next,'colonia'=>$request->colonia,'municipio'=>$request->municipio,'localidad'=>$request->localidad,'cp'=>$request->cp]);
    		}else{
    			$d=\DB::table('domicilio')->where('user_id',$id)->where('oir',1)->update(['calle'=>$request->calle,'ninter'=>$request->nint,'next'=>$request->next,'colonia'=>$request->colonia,'municipio'=>$request->municipio,'localidad'=>$request->localidad,'cp'=>$request->cp,'referencia'=>$request->ref]);
    		}
    		return back()->with('exito',true);
    	 // no es post sino get
    	}else{
	     	$id=$request->session()->get('id');
	    	$ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
	    	$dom=\DB::table('domicilio')->where('user_id',$id)->where('oir',1)->first();
	    	$per=\DB::table('persona')->where('user_id',$id)->first();
	    	$raw=\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno)as nombreusuario");
	    	$usuario=\DB::table('users')->select('id','nombre','a_paterno','a_materno','avatar','email',$raw)->where('id',$id)->first();
	    	$data=array(
	            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
	            'dom'=>$dom,'persona'=>$per,'usuario'=>$usuario,'tipo'=>"user"
	        ); 
	        // dd($data);
	        return view('other.perfil',$data);
        }
    }
    public function demandas(Request $request){// mostrar el listado de demandas en las que está involucrado el usuario
    	$id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw=\DB::raw('concat(u.nombre," ",u.a_paterno," ",u.a_materno) as nombre');
        $exp=\DB::select("select e.id,e.expediente,e.serie,e.descripcion,timeDIFF(now(),e.fecha) as transcurrido,e.status, concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as Demandado,i.razon_social from expediente e join users u on u.id=e.id_demandado join institucion i on i.user_id=e.id_demandado where e.id_demandante=?",[$id]);
        foreach ($exp as $k) {
        	$hora=$k->transcurrido;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->transcurrido="Hace ".$hora;
            switch ($k->status) {
            	case 0: $k->status="Registraste la demanda, en espera de procesar";break;
            	case 1: $k->status="En proceso de Admisión con el Oficial de Partes"; break;
            	case 2: $k->status="Enviado al Secretario de acuerdos"; break;
            	case 3: $k->status="La demanda ha sido Admitida";break;
            	case 4: $k->status="Se ha turnado al Actuario"; break;
            	case 5: $k->status="Notificado"; break;
            	case 6: $k->status="Turnado para preparacion de sentencia"; break;
            	case 7: $k->status="Preparando la sentencia";break;
            	case 8: $k->status="En revisión de la Sentencia"; break;
            	case 9:	$k->status="Sentencia establecida";break;
            	case 10: $k->status="Ejecutando la sentencia"; break;
            }
        }
        $data=array(
            'actuario'=>\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$raw)->where('r.role_id',2)->get(),
            
            'tipodoc'=>\DB::table('acuerdotipo')->where('nivel','6')->where('Tipo','<>','Demanda')->select('id','Tipo')->orderby('Tipo','DESC')->get(),
            'expediente'=>$exp,
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
            'rolid'=>$id
        );
        // dd($data);
    	return view('user.demanda.demanda',$data);
    }
    public function recuperar(Request $request){ //obtiene los documentos relacionados al expediente
    	$raw1=\DB::raw('DATE_FORMAT(a.FechaUp, "%d-%m-%Y") as FechaUp,a.PathAnexo,a.Folio, a.NomFile, act.Tipo');
        $data=array(
           'anexos'=>\DB::table('anexopdf as a')->join('acuerdotipo as act','act.id','a.id_Tipo')
                        ->select($raw1)->where('a.id_Expediente',$request->expediente)
                        ->orderby('Folio','DESC')->distinct()->get());
        return json_encode($data);
    }
    public function nuevademanda(Request $request){ //cargar la vista para registro de nueva demanda
    	$id=$request->session()->get('id');
    	$ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
    	$ex=\DB::table('expediente')->select('expediente')->orderby('id','desc')->first();
        if($ex==null){
            $ex=0;
        }else{
            $ex=$ex->expediente;
        }
        $raw1=\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno) as nombre, id");
        $us=\DB::table('users')->select($raw1)->where('id',$id)->first();
    	$data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'serie'=>date('Y'),'exp'=>$ex,'tipodocumento'=>\DB::table('acuerdotipo')->select('id','Tipo')->where('nivel',6)->where('estatus','<>',0)->orderby('Tipo','ASC')->get(),'usuario'=>$us
        );
    	return view('user.demanda.nueva',$data);
    }
    public function gettipo(Request $request){//obtiene el tipo de documentos permitidos para este usuario
		$data=\DB::table('acuerdotipo')->where('nivel',6)->where('estatus','<>',0)->select('id','Tipo')->orderby('Tipo','ASC')->get();
        return json_encode($data);
    }
    public function guardar(Request $request){//almacena la demanda nueva
    	//dd($request->all());
    	$folio=$request->exp;
        $fecha=date("Y-m-d H:i:s");
        $usuario=$request->id_usuario;
        // Almacenar expediente
        $exp=new expediente;
        $exp->id_usuario=$usuario;
        $exp->id_demandante=$request->id_demandante;
        $exp->id_demandado=$request->id_demandado;
        $exp->expediente=$folio;
        $exp->status=0;
        $exp->fecha=$fecha;
        $exp->serie=$request->serie;
        $exp->save();
        $id_exp=$exp->id;
        $id_exp=$exp->expediente;
        // almacenar seguimiento de la demanda;
        $seg=new seguimiento;
        $seg->fecha=$fecha;
        $seg->id_modulo=1;
        $seg->id_persona=$request->id_usuario;
        $seg->movimiento='Entrada';
        $seg->id_exp=$id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=1;
        $seg->comentarios="El usuario ha creado la demanda";
        $seg->save();
        // almacenar involucrados
        $inv=new involucrados;
        $inv->user_id=$request->id_demandante;
        $inv->id_exp=$id_exp;
        $inv->rol=2;
        $inv->status=1;
        $inv->fecha=$fecha;
        $inv->save();
        $inv=new involucrados;
        $inv->user_id=$request->id_demandado;
        $inv->id_exp=$id_exp;
        $inv->rol=1;
        $inv->status=1;
        $inv->fecha=$fecha;
        $inv->save();
        // almacenar anexos
        $archivo=$request->file('file');
        $tipos=$request->tipo;
        $cant=0;
        foreach ($archivo as $key) {
            $avatar=filehelper::uploadfile($key,$expediente,$request->serie);
            $anexo=new anexo;
            $anexo->id_Tipo=$tipos[$cant];
            $anexo->Folio=$request->exp.'_'.$cant;
            $anexo->id_Expediente=$id_exp;
            $anexo->FechaUp=$fecha;
            $anexo->PathAnexo='./Historico/'.$request->serie.'/'.$expediente;
            $anexo->NomFile=$avatar;
            $anexo->Status=0;
            $anexo->save();
            $cant=($cant)+1;
            // almacenar seguimiento de los anexos;
            $seg=new seguimiento;
            $seg->fecha=$fecha;
            $seg->id_modulo=1;
            $seg->id_persona=$request->id_usuario;
            $seg->movimiento='insitu';
            $seg->id_exp=$id_exp;
            $seg->id_anexo=$anexo->id;
            $seg->id_Tseguimiento=15;
            $seg->comentarios="Anexo de documento ";
            $seg->save();
        }
        $us=\DB::table('users')->select(\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno) as nombre"))->where('id',$usuario)->first();
        $m=new mensajes;
        $m->usuario_origen=$usuario;
        $m->usuario_destino=$usuario;
        $m->mensaje="Has registrado el Expediente ".$expediente.'/'.$request->serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$usuario;
        $m->usuario_destino=2;
        $m->mensaje="El usuario ".$us->nombre." ha registrado el Expediente ".$expediente.'/'.$request->serie."ver la sección Nuevas entradas";
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        return redirect("/user/demandas")->with('exito',true);
    }
    public function add_file(Request $request){ //agrega documento al expediente en cuestion
    	//dd($request->all());
    	$id_us=$request->session()->get('id');
        $id=$request->id_exp;
        $raw=\DB::raw('count(Folio) as cantidad');
        $folio=\DB::table('anexopdf')->select($raw)->where('id_Expediente',$id)->first();
        $exp=\DB::table('expediente')->select('expediente','serie')->where('id',$id)->first();
        $serie=$exp->serie;
        $exp=$exp->expediente;
        $folio=$folio->cantidad;
        $archivo=$request->pdf_file[0];
        $folio2=$exp.'_'.$folio;
        $fecha=date("Y-m-d H:i:s");
        $avatar=filehelper::uploadfile2($archivo,$exp,$serie);
        $anexo=new anexo;
        $anexo->id_Tipo=$request->id_tipo3;
        $anexo->Folio=$folio2;
        $anexo->id_Expediente=$id;
        $anexo->FechaUp=$fecha;
        $anexo->PathAnexo='./Historico/'.$serie.'/'.$exp;
        $anexo->NomFile=$avatar;
        $anexo->Status=0;
        $anexo->save();
        $seg=new seguimiento; // almacenar seguimiento de los anexos;
        $seg->fecha=$fecha;
        $seg->id_modulo=1;
        $seg->id_persona=$id_us;
        $seg->movimiento='insitu';
        $seg->id_exp=$id;
        $seg->id_anexo=$anexo->id;
        $seg->id_Tseguimiento=15;
        $seg->comentarios="Anexo de documento";
        $seg->save();
        $m=new mensajes;
        $m->usuario_origen=$id_us;
        $m->usuario_destino=$id_us;
        $m->mensaje="Registraste un nuevo documento en el Exp. ".$exp."/".$serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $us=\DB::table('users')->select(\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno) as nombre"))->where('id',$id_us)->first();
        $m=new mensajes;
        $m->usuario_origen=$id_us;
        $m->usuario_destino=2;
        $m->mensaje="El usuario ".$us->nombre." registró un nuevo documento al Expediente ".$exp."/".$serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        return redirect('/user/demandas')->with('exito2',true);
    }
    public function seguimiento(Request $request){ //cargar la vista de seguimiento de expedientes
    	$id=$request->session()->get('id');
    	$ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
    	$data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
            'exp'=>\DB::select('select v.id_expediente,v.expediente,v.fechasis,v.id_razonsocial,v.Demandado,v.id_demandante,v.Demandante,v.Resumen,e.serie from v_seguimiento v join expediente e on v.id_expediente=e.id where v.id_demandante=?',[$id]),'rol'=>"user"
        );
    	return view('user.seguimiento',$data);
    }
    public function getseguimiento(Request $request){ //cargar los documentos adjuntos al expediente en cuestion (AJAX)
    	// return json_encode($request->all());
        $data=array('anexos'=>\DB::table('trackseguimiento')->where('id',$request->exp)->get());
        return json_encode($data);
    }
    public function notif(Request $request){ //cargar la vista de notificaciones de sistema para el usuario
    	$id=$request->session()->get('id');
    	$ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
    	$raw=\DB::raw("date_format(created_at,'%d/%m/%Y ') as fecha,timediff(now(),created_at) as tiempo");
        $men=\DB::table('mensajes')->select('id','mensaje',$raw,'estatus')->where('usuario_destino',$id)->orderby('id','desc')->get();
        foreach ($men as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
    	$data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'mensajes2'=>$men,
        );
    	return view('user.notificaciones',$data);
    }
    public function updatenotif(Request $request){//actualiza el estado de la notificacion de sistema (AJAX)
    	$up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        $exito=true;
        return json_encode($request->all());
    }
}
