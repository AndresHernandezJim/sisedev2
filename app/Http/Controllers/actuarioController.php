<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mensajes;
use App\Helper\queryhelper;
use App\notificaciones;
use App\seguimiento;
use App\envios;
use App\anexo;
use App\Helper\filehelper;
use App\acuerdotipo;

class actuarioController extends Controller
{
    public function index(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
         $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get());
    	return view('actuario.home',$data);
    }
    public function acuerdos(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw=\DB::raw('concat(u.nombre," ",u.a_paterno," ",u.a_materno) as nombre');
        $data=array(
            'actuario'=>\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$raw)->where('r.role_id',5)->get(),
            'proyectista'=>\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$raw)->where('r.role_id',4)->get(),
            'tipoacuerdo'=>\DB::table('acuerdotipo')->where('nivel','2')->where('id','<>',11)->where('id','<>',8)->select('id','Tipo')->get(),
            'expediente'=>\DB::select("select * from v_expedientes3 where id in(select id_exp as id from envios where id_receptor=?)",[$id]),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->get(),'cant'=>$ca->cantidad,
            'rolid'=>$id,
            'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get()
        );
    	return view('actuario.acuerdos',$data);
    }
    public function notificaciones(Request $request){
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
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
            'mensajes2'=>$men,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get()
        );
    	return view('actuario.notificaciones',$data);
    }
    public function updatenotif(Request $request){
        $up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        return json_encode($request->all());
    }
    public function seguimiento(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('exp'=>\DB::select('select * from v_seguimiento'),
                'rol'=>'actuario',
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get());
    	return view('actuario.seguimiento',$data);
    }
    public function getseguimiento(Request $request){
        $data=array('anexos'=>\DB::table('trackseguimiento')->where('id',$request->exp)->get());
        return json_encode($data);
    }
    public function perfil($id,Request $request){
        if($_POST){
           //dd($request->all());
            $user=\DB::table('users')->where('id',$id)->first();
            $email=$request->email2;
            if($request->hasFile('file')){$archivo=1;}else{$archivo=0;}   
            if($email==$user->email){
                //no se actualiza el email
                if($archivo==1){
                    $imagen=$request->file('file');
                    $avatar=filehelper::uploadpic($imagen,$id);
                    $usuario=\DB::table('users')->where('id',$request->id)
                           ->update(['nombre'=>$request->nombre2,
                        'a_paterno'=>$request->a_paterno2,
                        'a_materno'=>$request->a_materno2,
                        'password'=>bcrypt($request->password),
                        'avatar'=>$avatar]);
                    return back()->with('exito',true);
                }else{
                    $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                    $avatar=$avatar->avatar;
                    $data=array(
                        'nombre'=>$request->nombre2,
                        'a_paterno'=>$request->a_paterno2,
                        'a_materno'=>$request->a_materno2,
                        'password'=>bcrypt($request->password),
                        'avatar'=>$avatar
                    );
                    $usuario=\DB::table('users')->where('id',$request->id)
                           ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                           return back()->with('exito',true);
                }
            }else{
                //se actualiz el email
                if($archivo==1){
                    $imagen=$request->file('file');
                    $avatar=filehelper::uploadpic($imagen,$id);
                    $data=array(
                        'nombre'=>"'".$request->nombre2."'",
                        'a_paterno'=>"'".$request->a_paterno2."'",
                        'a_materno'=>"'".$request->a_materno2."'",
                        'email'=>"'".$request->email2."'",
                        'password'=>"'".bcrypt($request->password)."'",
                        'avatar'=>"'".$avatar."'"
                    );
                    // dd($data);
                     $usuario=\DB::table('users')->where('id',$request->id)
                           ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                    return back()->with('exito',true);
                }else{
                    $avatar=\DB::table('users')->select('avatar')->where('id',$id)->first();
                    $avatar=$avatar->avatar;
                    $usuario=\DB::table('users')->where('id',$request->id)
                           ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                    return back()->with('exito',true);    
                }
            }
        }else{
            $id=$request->session()->get('id');
            $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
            $raw=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno)as Nombreusuario");
            $data=array(
            'usuario'=>\DB::table('users as u')->join('role_user as ru','ru.user_id','u.id')->join('roles as r','ru.role_id','r.id')->select('u.id',$raw,'u.nombre','u.a_paterno','u.a_materno','u.avatar','r.descripcion','u.email')->where('u.id',$id)->first(),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get()
            );
             //dd($data);
            return view('perfil',$data);
        }
    }
    public function recuperar(Request $request){
        $raw1=\DB::raw('DATE_FORMAT(a.FechaUp, "%d-%m-%Y") as FechaUp,a.PathAnexo,a.Folio, a.NomFile, act.Tipo');
        $data=array(
           'anexos'=>\DB::table('anexopdf as a')->join('acuerdotipo as act','act.id','a.id_Tipo')
                        ->select($raw1)->where('a.id_Expediente',$request->expediente)
                        ->orderby('FechaUp','asc')->distinct()->get());
        return json_encode($data);
    }
    public function getinvolved(Request $request){
        $demandante=\DB::select("select  e.id,u2.id as id_demandante, concat(u2.nombre,' ',u2.a_paterno,' ',u2.a_materno) as nombre, u2.email, i.rol from expediente e join users u2 on u2.id=e.id_demandante join involucrados i on i.id_exp=e.id where i.rol=1 and e.id=?;",[$request->id]);
        $demandado=\DB::select("select  e.id,i2.user_id as id_demandado, i2.razon_social as nombre, u2.email, i.rol from expediente e join users u2 on u2.id=e.id_demandado join involucrados i on i.id_exp=e.id join institucion i2 on i2.user_id=u2.id where i.rol=2 and e.id=?",[$request->id]);
        $data=array("demandante"=>$demandante,"demandado"=>$demandado);
        return json_encode($data);
    }
    public function notificar(Request $request){
        //dd($request->all());
        $time = date('H:i:s');
        $id_exp=$request->expediente;
        $tipodoc=$request->id_tipo;
        $observ=$request->obs;
        $archivo=$request->pdf_file;
        $fecha = $request->date.' '.$time; // Fecha de expediente
        $fecha1= $fecha;
        $fecha2 = $request->datelim." 00:00:00";
        $datelim = $fecha2;
        $demandado =$request->id_demandado;
        $demandante=$request->id_demandante;
        $raw=\DB::raw('count(Folio) as cantidad');
        $folio=\DB::table('anexopdf')->select($raw)->where('id_Expediente',$id_exp)->first();
        $exp=\DB::table('expediente')->select('expediente','serie')->where('id',$id_exp)->first();
        $serie=$exp->serie;
        $exp=$exp->expediente;
        $folio=$folio->cantidad;
        $folio2=$exp.'_'.$folio;
        //subir el archivo
        $avatar=filehelper::uploadfile2($archivo,$exp,$serie);
        $anexo=new anexo;
        $anexo->id_Tipo=$tipodoc;
        $anexo->Folio=$folio2;
        $anexo->id_Expediente=$id_exp;
        $anexo->FechaUp=$fecha;
        $anexo->PathAnexo='./Historico/'.$serie.'/'.$exp;
        $anexo->NomFile=$avatar;
        $anexo->Status=0;
        $anexo->save();
        $iddoc=$anexo->id;
        $seg=new seguimiento; // almacenar seguimiento de los anexos;
        $seg->fecha=$fecha;
        $seg->id_modulo=4;
        $seg->id_persona=$request->id_log;
        $seg->movimiento='insitu';
        $seg->id_exp=$id_exp;
        $seg->id_anexo=$anexo->id;
        $seg->id_Tseguimiento=8;
        $seg->comentarios=$observ;
        $seg->save();
        //almacenamos las notificaciones;
        $not=new notificaciones;
        $not->id_actuario=$request->id_log;
        $not->id_usuario=$demandado;
        $not->rol="Demandado";
        $not->id_exp=$id_exp;
        $not->id_anexo=$iddoc;
        $not->fecha_creacion=$fecha1;
        $not->fecha_solicitud=$fecha1;
        $not->fecha_limite=$datelim;
        $not->autorizacion=$request->id_log;
        $not->save();
        $not=new notificaciones;
        $not->id_actuario=$request->id_log;
        $not->id_usuario=$demandante;
        $not->rol="Demandante";
        $not->id_exp=$id_exp;
        $not->id_anexo=$iddoc;
        $not->fecha_creacion=$fecha1;
        $not->fecha_solicitud=$fecha1;
        $not->fecha_limite=$datelim;
        $not->autorizacion=$request->id_log;
        $not->save();
        //crear las notificaciones internas
        $m=new mensajes;
        $m->usuario_origen=$request->id_log;
        $m->usuario_destino=$request->id_log;
        $m->mensaje="Has notificado a los involucrados en el  el Exp. ".$exp."/".$serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$request->id_log;
        $m->usuario_destino=$demandado;
        $m->mensaje="Tienes una nueva notificacion sobre  el Exp. ".$exp."/".$serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$request->id_log;
        $m->usuario_destino=$demandante;
        $m->mensaje="Tienes una nueva notificacion sobre  el Exp. ".$exp."/".$serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        return redirect('/actuario/expedientes')->with('exito2',true);
    }
    public function resdocumento(Request $request){
        //return json_encode($request->all());
       if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>1])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function deldocumento(Request $request){
        //return json_encode($request->all());
        if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>0])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function adddocumento(Request $request){
        //return json_encode($request->all());
        $a=new acuerdotipo;
        $a->Tipo=$request->tipo;
        $a->Descripcion=" ";
        $a->nivel=3;
        $a->estatus=1;
        $a->save();
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
    }
    public function gettipodoc(Request $request){
        $d=\DB::table('acuerdotipo')->select('Tipo')->where('id',$request->id)->first();
        $d=$d->Tipo;
        return json_encode($d);
    }
    public function actualizartipo(Request $request){
        if($a=\DB::table('acuerdotipo')->where('id',$request->id)->update(['Tipo'=>$request->tipo])){
            $data=array('mensaje'=>"El tipo de documento se actualizó de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
            return json_encode($data);
        }
    }
}
