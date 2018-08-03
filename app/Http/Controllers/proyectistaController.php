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
use App\proyecto;
use App\chat;

class proyectistaController extends Controller
{
  public function index(Request $request){ //cargar la pagina de inicio para el usuario
        $id=$request->session()->get('id');
        //dd($id);
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
    	return view('proyectista.home',$data);
    }
    public function notificaciones(Request $request){ //carga la vista de las notificaciones del usuario para el sistema
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
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
            'mensajes2'=>$men,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat
        );
        //dd($data);
        return view('proyectista.notificaciones',$data);
    }
    public function updatenotif(Request $request){ //acutaliza el estado de las notificaciones
        $up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        $exito=true;
        return json_encode($request->all());
    }
    public function perfil($id,Request $request){// metodo para ver y actualizar el perfil de usuario
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
            $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
            $data=array(
            'usuario'=>\DB::table('users as u')->join('role_user as ru','ru.user_id','u.id')->join('roles as r','ru.role_id','r.id')->select('u.id',$raw,'u.nombre','u.a_paterno','u.a_materno','u.avatar','r.descripcion','u.email')->where('u.id',$id)->first(),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat
            );
            return view('perfil',$data);
        }
    }
    public function resdocumento(Request $request){//volver a habilitar el tipo de documento para este usuario
        //return json_encode($request->all());
       if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>1])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->orderby('Tipo','ASC')->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function deldocumento(Request $request){//deshabilitar el tipo de documento para este usuario
        //return json_encode($request->all());
        if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>0])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->orderby('Tipo','ASC')->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function adddocumento(Request $request){ //agregar un tipo de documento util para este usuario
        //return json_encode($request->all());
        $a=new acuerdotipo;
        $a->Tipo=$request->tipo;
        $a->Descripcion=" ";
        $a->nivel=4;
        $a->estatus=1;
        $a->save();
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
        return json_encode($data);
    }
    public function gettipodoc(Request $request){//obtener el tipo de documento seleccionado
        $d=\DB::table('acuerdotipo')->select('Tipo')->where('id',$request->id)->first();
        $d=$d->Tipo;
        return json_encode($d);
    }
    public function actualizartipo(Request $request){ //actualizar el tipo de documento que utiliza el usuario
        if($a=\DB::table('acuerdotipo')->where('id',$request->id)->update(['Tipo'=>$request->tipo])){
            $data=array('mensaje'=>"El tipo de documento se actualizó de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
            return json_encode($data);
        }
    }
    public function expedientes(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw=\DB::raw('concat(u.nombre," ",u.a_paterno," ",u.a_materno) as nombre');
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $rawactuario=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as nombre");
        $actuarios=\DB::table('users as u')->join('role_user as r','u.id','r.user_id')->select('u.id',$rawactuario)->where('r.role_id',5)->get();
        $data=array(
            'tipoacuerdo'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus','<>',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),
            'expediente'=>\DB::select("select DISTINCT v.id,v.expediente,v.fecha,v.status,v.rdemandado,v.demandante,v.rdemandante,v.resumen,v.avatar,v.serie,v.oficiales,v2.tiempo from v_expedientes2  v join v_entradasalida2 v2 on v.id=v2.id_exp join envios e on e.id_exp=v.id where id_receptor=? order by v.id desc",[$id]),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','DESC')->get(),'cant'=>$ca->cantidad,
            'rolid'=>$id,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat,'actuario'=>$actuarios
        );
       //dd($data);
        return view('proyectista.expedientes.expedientes',$data);
    }
    public function seguimiento(Request $request){ //vista general de los expedientes para seguimiento
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $data=array('exp'=>\DB::select('select v.id_expediente,v.expediente,v.fechasis,v.id_razonsocial,v.Demandado,v.id_demandante,v.Demandante,v.Resumen,e.serie from v_seguimiento v join expediente e on v.id_expediente=e.id'),
                'rol'=>'actuario',
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
       //dd($data);
        return view('proyectista.seguimiento',$data);
    }
    public function getseguimiento(Request $request){ //obtiene todos los documentos registrados en el expediente
        // return json_encode($request->all());
        $data=array('anexos'=>\DB::table('trackseguimiento')->where('id',$request->exp)->get());
        return json_encode($data);
    }
    public function proyectos(Request $request){ //listado de expedientes asignados al proyectista
        $id=$request->session()->get('id');
        //dd($id);
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;}
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
        return view('proyectista.proyectos.expedientes',$data);
    }
    public function redactar($exp,Request $request){//carga de pagina para redactar proyecto (numero==1)
        $id=$request->session()->get('id');
        $e=\DB::table('expediente')->select('id','serie')->where('expediente',$exp)->first();
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'exp'=>$exp,'serie'=>$e->serie,'id_exp'=>$e->id,'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
        return view('proyectista.expedientes.redactar',$data);
    }
    public function guardar(Request $request){//almacenar proyecto de sentencia (numero==1)
        // dd($request->all());
        //creamos el proyecto
        $id=$request->session()->get('id');
        $e=\DB::table('expediente')->select('id','expediente','serie')->where('id',$request->id_exp)->first();
        $fecha=$request->fechared." ".date('H:i:s');
        $proy=new proyecto;
        $proy->id_exp=$e->id;
        $proy->id_proy=$id;
        $proy->fecha_creacion=$fecha;
        $proy->texto=$request->texto;
        $proy->estatus=0;
        $proy->enable=1;
        $proy->save();
        //marcamos el seguimiento
        $seg=new seguimiento;
        $seg->fecha= $fecha;
        $seg->id_modulo=5;
        $seg->id_persona=$id;
        $seg->movimiento='insitu';
        $seg->id_exp=$e->id;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=12;
        $seg->comentarios="Elaborando Proyecto de Sentencia";
        $seg->save();
        //desplegamos el mensaje para el usuario de la creación del proyecto
        $m=new mensajes;
        $m->usuario_origen=$id;
        $m->usuario_destino=$id;
        $m->mensaje="Se ha registrado el Proyecto de sentencia #1 para el expediente ".$e->expediente.'/'.$e->serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        //actualizamos el estatus del expediente
        $e2=\DB::table('expediente')->where('id',$e->id)->update(['status'=>7]);
        return redirect('/proyectista/expedientes')->with('exito',true);
    }
    public function guardar2(Request $request){//almacenar el nuevo proyecto (numero>1)
        // dd($request->all());
        //creamos el proyecto
        $id=$request->session()->get('id');
        $cant=\DB::table('proyectos')->select('numero')->where('id_exp',$request->id_exp)->orderby('id','desc')->first();
        $cant=$cant->numero+1;
        $e=\DB::table('expediente')->select('id','expediente','serie')->where('id',$request->id_exp)->first();
        $fecha=$request->fechared." ".date('H:i:s');
        $proy=new proyecto;
        $proy->id_exp=$e->id;
        $proy->id_proy=$id;
        $proy->fecha_creacion=$fecha;
        $proy->texto=$request->texto;
        $proy->estatus=0;
        $proy->enable=1;
        $proy->numero=$cant;
        $proy->save();
        //desplegamos el mensaje para el usuario de la creación del proyecto
        $m=new mensajes;
        $m->usuario_origen=$id;
        $m->usuario_destino=$id;
        $m->mensaje="Se ha registrado el Proyecto de sentencia #".$cant." para el expediente ".$e->expediente.'/'.$e->serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        return redirect('/proyectista/expedientes/ver/'.$e->id)->with('exito',true);
    }
    public function ver($exp,Request $request){ //ver los proyectos redactados por expediente
        $id=$request->session()->get('id');
        //dd($id);
        $proyectos=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->select('p.id','p.id_exp','p.fecha_creacion','p.fecha_envio','p.estatus','p.numero','e.serie','e.expediente','p.id_proy as proyectista')->where('p.id_proy',$id)->where('p.id_exp',$exp)->get();
        foreach ($proyectos as $k) {
            if($k->fecha_envio==null){
                $k->fecha_envio="No enviado";
            }
            switch ($k->estatus) {case 0: $k->estatus="Creado";break; case 1: $k->estatus="Enviado a revisión";break;case 2: $k->estatus="En revisión";break; case 3: $k->estatus="Aceptado";break; case 4: $k->estatus="Rechazado"; break;}}
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'p'=>$proyectos,'exp'=>$exp,'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
        //dd($data);
        return view('proyectista.proyectos.proyectos',$data);
    }
    public function ver2($id2,$id3,Request $request){ //visualizar la ventana de edicion y el chat para el proyecto
        $id=$request->session()->get('id');
        $raw=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as origen,DATE_FORMAT(c.fecha_creacion,'%Y-%m-%d') as fecha,DATE_FORMAT(c.fecha_creacion,'%h:%i %p') as hora");
        $chat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')->select('c.id as id_chat','c.id_origen','u.avatar as foto1',$raw,'c.id_receptor','c.mensaje','c.estado')->where('c.id_exp',$id3)->where('c.id_proyecto',$id2)->get();
        //dd($chat);
        if(empty($chat)){
            $chat=null;
        }
        $id_dest=\DB::table('chat')->select('id_receptor')->where('id_exp',$id3)->where('id_origen',$id)->first();
        if($id_dest==null){
            $id_dest=10;
        }else{
            $id_dest=$id_dest->id_receptor;
        }
        $cuenta=\DB::table('chat')->select(\DB::raw("count(id) as total"))->where('id_receptor',$id)->where('estado','0')->where('id_exp',$id3)->first(); 
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $rawmagi=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as magistrado");
        $magi=\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$rawmagi)->where('r.role_id',6)->get();
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'p'=>\DB::table('proyectos')->select('id as id_proyecto','id_exp','texto','estatus')->where('id',$id2)->first(),'exp'=>$id3,'chat'=>$chat,'destino'=>$id_dest,'cuenta'=>$cuenta->total,'cchat'=>$cantch->cantidad,'mchat'=>$mchat,'magistrados'=>$magi,'us'=>$id);
        //dd($data);
        return view('proyectista.proyectos.editar',$data);
    }
    public function gettexto(Request $request){ //obtener el texto del proyecto
        $t=\DB::table('proyectos')->select('texto')->where('id',$request->id)->first();
        return json_encode($t);
    }
    public function editar(Request $request){//Editar el proyecto
        //dd($request->all());
        $p1=\DB::table('proyectos')->select('texto')->where('id',$request->id_proy)->first();
        $dir="/proyectista/expedientes/ver".$request->exp;
        if($p1->texto==$request->texto){
            //dd("no cambia");
            return back()->with('error',true);
        }else{
            //dd("cambia");
            $p=\DB::table('proyectos')->where('id',$request->id_proy)->update(['texto'=>$request->texto]);
            return back()->with('exito',true);
        }
    }
    public function addchat(Request $request){ //agregar un nuevo mensaje al chat
        // return json_encode($request->all());
        $id_us=$request->session()->get('id');
        //actualizar los mensajes del chat
        $chat2=\DB::table('chat')->where('id_exp',$request->id_exp)->where('id_proyecto',$request->id_pro)->where('id_receptor',$request->id_us)->get();
        if(sizeof($chat2)!=0){
             $u=\DB::table('chat')->where('id_receptor',$id_us)->where('id_exp',$request->id_exp)->update(['estado'=>1]);
        }
        // creamos un nuevo mensaje del chat
        $serie=\DB::table('expediente')->select('serie')->where('id',$request->id_exp)->first();
        $c=new chat;
        $c->id_origen=$id_us;
        $c->id_receptor=$request->receptor;
        $c->id_exp=$request->id_exp;
        $c->mensaje=$request->msj;
        $c->fecha_creacion=date('Y-m-d H:i:s');
        $c->estado=0;
        $c->serie=$serie->serie;
        $c->id_proyecto=$request->id_pro;
        $c->save();
        // obtenemos los mensajes y los retornamos
        $chat=\DB::select("select c.id as id_chat,c.id_origen,u.avatar as foto1,concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as origen,c.id_receptor,c.mensaje,c.estado,DATE_FORMAT(c.fecha_creacion,'%Y-%m-%d') as fecha,DATE_FORMAT(c.fecha_creacion,'%h:%i %p') as hora from chat as c join users u on c.id_origen=u.id where c.id_exp=?",[$request->id_exp]);
        return json_encode($chat);
    }
    public function nuevoproy($id_exp,Request $request){//opcion agregar un nuevo proyecto (numero>1)
        $id_us=$request->session()->get('id');
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id_us)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id_us)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $s=\DB::table('expediente')->select('serie')->where('id',$id_exp)->first();
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id_us)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id_us)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat,'exp'=>$id_exp,'serie'=>$s->serie);
        return view('proyectista.proyectos.nuevo',$data);
    }
    public function segproy(Request $request){ //obtener le seguimiento de proyectos redactados
        $id=$request->session()->get('id');
        //dd($id);
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $creado1=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->where('p.id_proy',$id)->where('enable','<>',0)->where('estatus',0)->select('p.id','p.id_exp','e.expediente','e.serie','p.fecha_creacion','p.estatus','p.numero','p.fecha_envio');
        $creado=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->where('p.id_proy',$id)->where('enable','<>',0)->where('estatus',1)->select('p.id','p.id_exp','e.expediente','e.serie','p.fecha_creacion','p.estatus','p.numero','p.fecha_envio')->union($creado1)->get();
        //dd($creado);
        foreach ($creado as $k) {
            if($k->fecha_envio==null){$k->fecha_envio="No Enviado";}
        }
        $aprovado=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->where('p.id_proy',$id)->where('enable','<>',0)->where('estatus',3)->select('p.id','p.id_exp','e.expediente','e.serie','p.fecha_creacion','p.estatus','p.numero','p.fecha_envio')->orderBy('p.id','DESC')->get();
        $recha=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->where('p.id_proy',$id)->where('enable',0)->where('estatus',4)->select('p.id','p.id_exp','e.expediente','e.serie','p.fecha_creacion','p.estatus','p.numero','p.fecha_envio')->orderBy('p.id','DESC')->get();
        $revision=\DB::table('proyectos as p')->join('expediente as e','p.id_exp','e.id')->where('p.id_proy',$id)->where('enable','<>',0)->where('estatus',2)->select('p.id','p.id_exp','e.expediente','e.serie','p.fecha_creacion','p.estatus','p.numero','p.fecha_envio')->orderBy('p.id','DESC')->get();
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $rawmagi=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as magistrado");
        $magi=\DB::table('users as u')->join('role_user as r','r.user_id','u.id')->select('u.id',$rawmagi)->where('r.role_id',6)->get();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat,'creado'=>$creado,'rev'=>$revision,'acep'=>$aprovado,'recha'=>$recha,'magistrados'=>$magi);
        //dd($data);
        return view('proyectista.proyectos.seguimiento_proyectos',$data);
    }
    public function agregarsentecia(Request $request){ //agregar documento de sentencia al expediente
        //dd($request->alL());
        $us=$request->session()->get('id');
        $tipo=$request->id_tipoa;
        $fecha=date("Y-m-d H:i:s");
        $tipos=$request->tiposeguimiento;
        $id=$request->expediente;
        $raw=\DB::raw('count(Folio) as cantidad');
        $folio=\DB::table('anexopdf')->select($raw)->where('id_Expediente',$id)->first();
        $exp=\DB::table('expediente')->select('expediente','serie')->where('id',$id)->first();
        $serie=$request->serie;
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
    
        $seg=new seguimiento; // almacenar seguimiento de los anexos;
        $seg->fecha=$fecha;
        $seg->id_modulo=3;
        $seg->id_persona=$us;
        $seg->movimiento='insitu';
        $seg->id_exp=$id;
        $seg->id_anexo=$anexo->id;
        $seg->id_Tseguimiento=$tipos;
        $seg->comentarios="Se anexa la Sentencia del Expediente";
        $seg->save();
        return back()->with('exito2',true);
    }
    public function enviar(Request $request){//enviar el proyecto al magistrado para revision
        // return json_encode($request->all());
        //actualizar estatus del proyecto a 1;
        $p=\DB::table('proyectos')->where('id',$request->id_proy)->update(['estatus'=>1,'fecha_envio'=>date('Y-m-d H:i:s')]);
        $p2=\DB::table('proyectos as p')->join('expediente as e','e.id','p.id_exp')->select('p.id_exp','e.serie','p.numero','e.expediente')->where('p.id',$request->id_proy)->first();
        $us=\DB::table('users')->select(\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno) as nombre"))->where('id',$request->id_mag)->first();
        //crear notificacion de sistema tanto para el actuario como para el magistrado
        $us=$request->session()->get('id');
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$us;
        $m->mensaje="Has enviado el Proyecto de sentencia #".$p2->numero." del espediente ".$p2->expediente.'/'.$p2->serie." para revisión ";
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$request->id_mag;
        $m->mensaje=" El Proyecto de sentencia #".$p2->numero." del espediente ".$p2->expediente.'/'.$p2->serie." esta preparado para revisión ";
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        //retornar los datos del proyecto y el nombre del usuario para la notificacion
        $data=array('proyecto'=>$p2,'usuario'=>$us->nombre);
        return json_encode($data);
    }
    public function notificar(Request $request){ //enviar el expediente al actuario para notificar
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
        $seg->comentarios="Se turna el Expediente al Actuario para notificar la Sentencia";
        $seg->save();
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=4;
        $seg->id_persona=$request->id_ac;
        $seg->movimiento='Re-Entrada';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=$request->tiposeg;
        $seg->comentarios="Se recibe el Expediente para Notificar Sentencia";
        $seg->save();
        $env=new envios;
        $env->id_exp=$request->id_exp;
        $env->id_envio=$request->id_log;
        $env->id_receptor=$request->id_ac;
        $env->fecha=$fecha1;
        $env->save();
        $exp=\DB::table('expediente')->where('id',$request->id_exp)->update(['status'=>9]);
        $usuario=\DB::table('users')->where('id',$request->id_ac)->first();
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $data=['nombre'=>$usuario->nombre,'a_paterno'=>$usuario->a_paterno,'a_materno'=>$usuario->a_materno,'expediente'=>$expediente->expediente,'serie'=>$expediente->serie];
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$us;
        $m->mensaje="Enviaste el Exp. ".$expediente->expediente."/".$expediente->serie." al Actuario ".$usuario->nombre." ".$usuario->a_paterno." ".$usuario->a_materno." para notificar la sentencia";
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$us;
        $m->usuario_destino=$request->id_ac;
        $m->mensaje="El Expediente ".$expediente->expediente.'/'.$expediente->serie.' se te ha asignado para Notificar sentencia';
        $m->estatus=0;
        $m->created_at=$fecha1;
        $m->updated_at=null;
        $m->save();
       return json_encode($data);            
    }
}
