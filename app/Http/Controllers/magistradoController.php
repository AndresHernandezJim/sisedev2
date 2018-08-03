<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\queryhelper;
use App\Role;

class magistradoController extends Controller
{
    //
    public function index(Request $request){
        $id=$request->session()->get('id');
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
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
        //dd($data);
    	return view('magistrado.home',$data);
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
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad
            );
             //dd($data);
            return view('perfil',$data);
        }
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
            'mensajes2'=>$men,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',2)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',2)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
        );
        return view('secretario.notificaciones',$data);
    }
    public function updatenotif(Request $request){
        $up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        return json_encode($request->all());
    }
    public function crear(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
    	$data=array(
    		'tipo'=>\DB::table('roles')->select('id','nombre')->where('id','<>','7')->where('id','<>','6')->where('id','<>','1')->get(),'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
    	);
    	//dd($data);
    	return view('magistrado.usuarios.registro',$data);
    }
    public function search(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'usuarios'=>\DB::table('v_innerusers')->get()
        );
    	return view('magistrado.usuarios.busqueda',$data);
    }
    public function registro(Request $request){
    	dd($request->all());
    }
    
    public function demandas(Request $request){
         $id=$request->session()->get('id');
        $raw1=\DB::raw("concat(d.nombre,' ',d.a_paterno,' ',d.a_materno) demandante");
        $raw2=\DB::raw("concat(d1.nombre,' ',d1.a_paterno,' ',d1.a_materno) demandado");
        $raw3=\DB::raw('date(e.fecha) as fecha');
        $raw4=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as Nombre");
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
        $data=array('exp'=>\DB::select('select v.id_expediente as id, v.expediente, v.fechasis as fecha, v.id_razonsocial, v.Demandado as demandado, v.id_demandante, v.Demandante as demandante, v.Resumen as resumen, e.serie from v_seguimiento v join expediente e on v.id_expediente=e.id'),
                  'tipodocumento'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),
                  'fecha'=>date('Y-m-d'),
                   'secretarios'=>\DB::table('users as u')->join('role_user as rs','u.id','rs.user_id')->select('u.id',$raw4)->where('rs.role_id','3')->get(),
                    'rol'=>'magistrado',
                    'tipoac'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',3)->where('estatus',0)->select('id','Tipo')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat,'cant'=>$ca->cantidad,'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),
            );
       //dd($data);
 
        return view('magistrado.demanda.demanda',$data);
    }
    public function recuperar(Request $request){
        //dd($request->all());
        $raw1=\DB::raw('DATE_FORMAT(a.FechaUp, "%d-%m-%Y") as FechaUp,a.PathAnexo,a.Folio, a.NomFile, act.Tipo');
        $data=array(
           'anexos'=>\DB::table('anexopdf as a')
                        ->join('acuerdotipo as act','act.id','a.id_Tipo')
                        ->select($raw1)->where('a.id_Expediente',$request->expediente)
                        ->orderby('FechaUp','DESC')->distinct()->get(),
        );
        //dd($data);
        return json_encode($data);
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
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
    }
    public function gettipodoc(Request $request){
        $d=\DB::table('acuerdotipo')->select('Tipo')->where('id',$request->id)->first();
        $d=$d->Tipo;
        return json_encode($d);
    }
    public function actualizartipo(Request $request){
        if($a=\DB::table('acuerdotipo')->where('id',$request->id)->update(['Tipo'=>$request->tipo])){
            $data=array('mensaje'=>"El tipo de documento se actualizó de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
            return json_encode($data);
        }
    }
    public function proyectos(Request $request){ //manda la vista del listado de los expedientes que tienen proyecto
        $id=$request->session()->get('id');
        $rawchat=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as remitente, TIMEDIFF(now(),c.fecha_creacion) as tiempo");
        $cantch=\DB::table('chat')->select(\DB::raw('count(id) as cantidad'))->where('id_receptor',$id)->where('estado',0)->first();
        $mchat=\DB::table('chat as c')->join('users as u','c.id_origen','u.id')
                ->select('c.id','c.id_exp','u.avatar','c.estado','c.id_proyecto','c.serie',$rawchat,'c.mensaje')->where('c.id_receptor',$id)->orderby('c.id','DESC')->get();
        foreach ($mchat as $k) {$hora=$k->tiempo;list($horas, $minutos, $segundos) = explode(':', $hora);$hora_en_segundos=($horas*3600)+($minutos*60)+$segundos;$minutos=$hora_en_segundos/60;$hora=queryhelper::tohours($minutos,"");$k->tiempo=$hora;}
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat,
            'exp'=>\DB::select("select v.id,v.expediente,v.serie,v.fecha, v.rdemandado as demandado, v.demandante,v.status from v_expedientes v where v.id in(select DISTINCT id_exp from proyectos)"));
        //dd($data);
        return view('magistrado.proyectos.lista',$data);
    }
    public function proyexpe($idexp,Request $request){
        $id=$request->session()->get('id');
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
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',4)->orwhere('nivel',5)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'cchat'=>$cantch->cantidad,'mchat'=>$mchat);
        return view('magistrado.proyectos.expediente',$data);
    }

}
