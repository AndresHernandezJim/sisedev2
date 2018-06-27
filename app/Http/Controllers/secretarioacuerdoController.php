<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\anexo;
use App\seguimiento;
use App\mensajes;
use App\Helper\filehelper;
use App\Helper\queryhelper;
use App\envios;
class secretarioacuerdoController extends Controller
{
    public function index(Request $request){
        $id=$request->session()->get('id');
        //dd($id);
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad);
    	return view('secretario.home',$data);
    }
    public function notif(Request $request){
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
            'mensajes2'=>$men
        );
        return view('secretario.notificaciones',$data);
    }
    public function updatenotif(Request $request){
        $up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        return json_encode($request->all());
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
                           ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,
                        'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                    return back()->with('exito',true);
                }else{
                    $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                    $avatar=$avatar->avatar;
                    $data=array('nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,
                        'password'=>bcrypt($request->password),'avatar'=>$avatar);
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
                        'nombre'=>"'".$request->nombre2."'",'a_paterno'=>"'".$request->a_paterno2."'",'a_materno'=>"'".$request->a_materno2."'",
                        'email'=>"'".$request->email2."'",'password'=>"'".bcrypt($request->password)."'",'avatar'=>"'".$avatar."'");
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
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad
            );
            return view('perfil',$data);
        }
    }
    public function acuerdos( Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw=\DB::raw('concat(u.nombre," ",u.a_paterno," ",u.a_materno) as nombre');
        $data=array(
            'actuario'=>\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$raw)->where('r.role_id',5)->get(),
            'proyectista'=>\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$raw)->where('r.role_id',4)->get(),
            'tipoacuerdo'=>\DB::table('acuerdotipo')->where('nivel','2')->where('id','<>',11)->where('id','<>',8)->select('id','Tipo')->get(),
            'expediente'=>\DB::select("select  * from v_expedientes2  v join v_entradasalida2 v2 on v.id=v2.id_exp join envios e on e.id_exp=v.id where id_receptor=? order by v.id desc",[$id]),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->get(),'cant'=>$ca->cantidad,
            'rolid'=>$id
        );
        //dd($data);
        return view('secretario.acuerdos.acuerdo',$data);
    }
    public function recuperar(Request $request){
        $raw1=\DB::raw('DATE_FORMAT(a.FechaUp, "%d-%m-%Y") as FechaUp,a.PathAnexo,a.Folio, a.NomFile, act.Tipo');
        $data=array(
           'anexos'=>\DB::table('anexopdf as a')->join('acuerdotipo as act','act.id','a.id_Tipo')
                        ->select($raw1)->where('a.id_Expediente',$request->expediente)
                        ->orderby('FechaUp','asc')->distinct()->get());
        return json_encode($data);
    }
    public function seguimiento( Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('exp'=>\DB::select('select * from v_seguimiento'),
                'rol'=>'secretarioacuerdo',
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->get(),'cant'=>$ca->cantidad);
        return view('secretario.seguimiento',$data);
    }
    public function getseguimiento(Request $request){
        $data=array('anexos'=>\DB::table('trackseguimiento')->where('id',$request->exp)->get());
        return json_encode($data);
    }
    public function agregar(Request $request){
        //dd($request->alL());
        $us=$request->session()->get('id');
        $tipo=$request->id_tipoa;
        $fecha=date("Y-m-d H:i:s");
        $tipos=$request->tiposeguimiento;
        $id=$request->expediente;
        $desecha=$request->desecha;
        if($desecha==1){
            $razon="Desistir al proceso";
        }elseif($desecha==2){
            $razon="Incompetencia";
        }else{
            $razon="Falta de Requerimientos";
        }
        $serie=$request->serie;
        $raw=\DB::raw('count(Folio) as cantidad');
        $folio=\DB::table('anexopdf')->select($raw)->where('id_Expediente',$id)->first();
        $exp=\DB::table('expediente')->select('expediente')->where('id',$id)->first();
        $exp=$exp->expediente;
        $folio=$folio->cantidad;
        $archivo=$request->pdf_file;
        $folio2=$exp.'_'.$folio;
        $avatar=filehelper::uploadfile2($archivo,$exp,$serie);
        $anexo=new anexo;
        $anexo->id_Tipo=$tipo;
        $anexo->Folio=$folio2;
        $anexo->id_Expediente=$id;
        $anexo->FechaUp=$fecha;
        $anexo->PathAnexo='./Historico/'.$serie.'/'.$exp;
        $anexo->NomFile=$avatar;
        $anexo->Status=0;
        $anexo->save();
        if($tipos==4 || $tipos==5){
            $seg=new seguimiento; // almacenar seguimiento de los anexos;
            $seg->fecha=$fecha;
            $seg->id_modulo=3;
            $seg->id_persona=$us;
            $seg->movimiento='insitu';
            $seg->id_exp=$id;
            $seg->id_anexo=$anexo->id;
            $seg->id_Tseguimiento=$tipos;
            $seg->comentarios=$razon;
            $seg->save();
            $ex=\DB::table('expediente')->where('id',$id)->update(['status'=>11]);
            $m=new mensajes;
            $m->usuario_origen=$us;
            $m->usuario_destino=$us;
            $m->mensaje="El Exp. ".$exp."/".$serie." se ha  Desechado bajo argumento de ".$razon;
            $m->estatus=0;
            $m->created_at=date('Y-m-d H:i:s');
            $m->updated_at=null;
            $m->save();
        }elseif($tipos==6){
            $seg=new seguimiento; // almacenar seguimiento de los anexos;
            $seg->fecha=$fecha;
            $seg->id_modulo=3;
            $seg->id_persona=$us;
            $seg->movimiento='insitu';
            $seg->id_exp=$id;
            $seg->id_anexo=$anexo->id;
            $seg->id_Tseguimiento=$tipos;
            $seg->comentarios="Anexo de Documento";
            $seg->save();
            $ex=\DB::table('expediente')->where('id',$id)->update(['status'=>3]);
        }else{
            $seg=new seguimiento; // almacenar seguimiento de los anexos;
            $seg->fecha=$fecha;
            $seg->id_modulo=3;
            $seg->id_persona=$us;
            $seg->movimiento='insitu';
            $seg->id_exp=$id;
            $seg->id_anexo=$anexo->id;
            $seg->id_Tseguimiento=$tipos;
            $seg->comentarios=$request->obs;
            $seg->save();
        }
       return redirect('secretarioacuerdo/acuerdos')->with('exito2',true);
    }
    public function notificar(Request $request){
        $fecha1= date("Y-m-d H:i:s");
        $us=$request->session()->get('id');
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=3;
        $seg->id_persona=$request->id_log;
        $seg->movimiento='Salida';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=$request->tiposeg;
        $seg->comentarios="Se turna el Expediente al Actuario para Notificar";
        $seg->save();
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=4;
        $seg->id_persona=$request->id_ac;
        $seg->movimiento='Entrada';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=$request->tiposeg;
        $seg->comentarios="Se recibe el Expediente para Notificar";
        $seg->save();
        $env=new envios;
        $env->id_exp=$request->id_exp;
        $env->id_envio=$request->id_log;
        $env->id_receptor=$request->id_ac;
        $env->fecha=$fecha1;
        $env->save();
        $exp=\DB::table('expediente')->where('id',$request->id_exp)->update(['status'=>4]);
        $usuario=\DB::table('users')->where('id',$request->id_ac)->first();
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $data=['nombre'=>$usuario->nombre,'a_paterno'=>$usuario->a_paterno,'a_materno'=>$usuario->a_materno,'expediente'=>$expediente->expediente,'serie'=>$expediente->serie];
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$us;
        $m->mensaje="Enviaste el Exp. ".$expediente->expediente."/".$expediente->serie." al Actuario ".$usuario->nombre." ".$usuario->a_paterno." ".$usuario->a_materno." para notificar";
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$request->id_ac;
        $m->mensaje="El Expediente ".$expediente->expediente.'/'.$expediente->serie.' se te ha asignado para Notificar';
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
       return json_encode($data);            
    }
    public function enviar(Request $request){
        // return json_encode($request->all());
        $fecha1= date("Y-m-d H:i:s");
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=3;
        $seg->id_persona=$request->id_log;
        $seg->movimiento='Salida';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=$request->tiposeg;
        $seg->comentarios="Se turna el Expediente al Proyectista para Redactar Proyecto de Sentencia";
        $seg->save();
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=5;
        $seg->id_persona=$request->id_pr;
        $seg->movimiento='Entrada';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=$request->tiposeg;
        $seg->comentarios="Se recibe el Expediente para Redactar el Proyecto de Sentencia";
        $seg->save();
        $env=new envios;
        $env->id_exp=$request->id_exp;
        $env->id_envio=$request->id_log;
        $env->id_receptor=$request->id_pr;
        $env->fecha=$fecha1;
        $env->save();
        $exp=\DB::table('expediente')->where('id',$request->id_exp)->update(['status'=>6]);
        $usuario=\DB::table('users')->where('id',$request->id_pr)->first();
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $data=['nombre'=>$usuario->nombre,'a_paterno'=>$usuario->a_paterno,'a_materno'=>$usuario->a_materno,'expediente'=>$expediente->expediente,'serie'=>$expediente->serie];
        $m=new mensajes;
        $m->usuario_origen=$request->id_log;
        $m->usuario_destino=$request->id_log;
        $m->mensaje="Enviaste el Exp. ".$expediente->expediente."/".$expediente->serie." al Proyectista ".$usuario->nombre." ".$usuario->a_paterno." ".$usuario->a_materno."";
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$request->id_log;
        $m->usuario_destino=$request->id_pr;
        $m->mensaje="El Expediente ".$expediente->expediente.'/'.$expediente->serie.' se te ha asignado para Redactar el Proyecto de Sentencia';
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
       return json_encode($data);            
    }
}
