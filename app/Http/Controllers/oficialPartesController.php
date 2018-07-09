<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\direccion;
use App\persona;
use App\institucion;
use App\expediente;
use App\seguimiento;
use App\Helper\filehelper;
use App\Helper\queryhelper;
use App\anexo;
use App\involucrados;
use App\mensajes;
use App\envios;
use App\acuerdotipo;
class oficialPartesController extends Controller
{
    //
    public function index(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
        'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
        //dd($data);

    	return view('oficialpartes.home',$data);
    }
    public function getname(Request $request){
        $name=\DB::table('users')->select(\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno) as nombre"))->where('id',$request->id)->first();
        $data=array('nombre'=>$name->nombre);
        return json_encode($data);
    }
    public function entradas(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
        'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),
        'exp'=>\DB::table('v_new_exp')->where('status',0)->get());
        // dd($data);
        return view('oficialpartes.demanda.entradas',$data);
    }
    public function sendmensaje(Request $request){ //enviar notificacion al usuario que registró la demanda
        // return json_encode($request->all());
        //creamos el seguimiento de retroalimentacion para el usuario
        $id=$request->session()->get('id');
        $p=\DB::table('users')->select(\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno)as nombre"))->where('id',$request->id_dema)->first();
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $fecha=date('Y-m-d H:i:s');
        $seg=new seguimiento;
        $seg->fecha=$fecha;
        $seg->id_modulo=2;
        $seg->id_persona=$id;
        $seg->movimiento='Retorno';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=17;
        $seg->comentarios="Envío de retroalimentación al usario para cambios en el expediente";
        $seg->save();
        //creamos las notifiaciones para el usuario y el actuario
        $serie=$expediente->serie;
        $expediente=$expediente->expediente;
        $m=new mensajes;
        $m->usuario_origen=$id;
        $m->usuario_destino=$id;
        $m->mensaje="Se han solicitado cambios al ".$expediente.'/'.$serie." del usuario ".$p->nombre;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$id;
        $m->usuario_destino=$request->id_dema;
        $m->mensaje=$request->men." en Exp ".$expediente.'/'.$serie;
        $m->estatus=0; //verificar aquí
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        //retornamos el nombre del usuario al que se mandaron las notificaciones
        $dat=array('nombre'=>$p->nombre);
        return json_encode($dat);
    }
    public function validademanda(Request $request){//validar la demanda registrada por el usuario
        $id_usuario=$request->session()->get('id');
        $id_dem=$request->id_deman;
        //actualizamos el expediente
         $e=\DB::table('expediente')->where('id',$request->id_exp)->update(['idtipo'=>$request->tipod,'descripcion'=>$request->obs,'status'=>1]);
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $serie=$expediente->serie;
        $expediente=$expediente->expediente;
        $fecha=date('Y-m-d H:i:s');
        //creamos el seguimiento (movimiento entrada en modulo 2)
        $seg=new seguimiento;
        $seg->fecha=$fecha;
        $seg->id_modulo=2;
        $seg->id_persona=$id_usuario;
        $seg->movimiento='Entrada';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=2;
        $seg->comentarios=$request->obs;
        $seg->save();
        //creamos mensajes de notificacion para usuario y secretario
        $m=new mensajes;
        $m->usuario_origen=$id_usuario;
        $m->usuario_destino=$id_usuario;
        $m->mensaje="Se ha validado el Expediente ".$expediente.'/'.$serie." y comienza su proceso";
        $m->estatus=0;
        $m->created_at=$fecha;
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=$id_usuario;
        $m->usuario_destino=$id_dem;
        $m->mensaje="El Expediente ".$expediente.'/'.$serie."se ha recibido, comienza el proceso de seguimiento";
        $m->estatus=0;
        $m->created_at=$fecha;
        $m->updated_at=null;
        $m->save();
        $exp=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        return json_encode($exp);
    }
    public function demandas(Request $request){
        $raw1=\DB::raw("d.razon_social as rdemandante");
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw2=\DB::raw("d1.nombre as demandado,d1.razon_social as rdemandado");
        $raw3=\DB::raw('date(e.fecha) as fecha');
        $raw4=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as Nombre");
        $raw5=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as oficiales");
        $data=array(
                'exp'=>\DB::table('v_expedientes as a')->join('v_entradasalida1 as b','a.id','b.id_exp')->orderby('id','desc')->get(),
                  'tipodocumento'=>\DB::table('acuerdotipo')->where('nivel',1)->where('Tipo','<>','Demanda')->select('id','Tipo')->get(),
                  'fecha'=>date('Y-m-d'),
                   'secretarios'=>\DB::table('users as u')->join('role_user as rs','u.id','rs.user_id')->select('u.id',$raw4)->where('rs.role_id','3')->get(),'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get(),
                   'rol'=>'oficialpartes',
                   'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad
            );
       //dd($data);
    	return view('oficialpartes.demanda.demanda',$data);
    }
    public function notificaciones(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $raw=\DB::raw("date_format(created_at,'%d/%m/%Y ') as fecha,timediff(now(),created_at) as tiempo");
        $men=\DB::table('mensajes')->select('id','mensaje',$raw,'estatus')->where('usuario_destino',$id)->orderby('id','DESC')->get();
        foreach ($men as $k) {
            $hora=$k->tiempo;
            list($horas, $minutos, $segundos) = explode(':', $hora);
            $hora_en_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
            $minutos=$hora_en_segundos/60;
            $hora=queryhelper::tohours($minutos,"");
            $k->tiempo=$hora;
        }
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',2)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
            'mensajes2'=>$men,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
        );
        //dd($data);
    	return view('oficialpartes.notificaciones',$data);
    }
    public function updatenotif(Request $request){
        $up=\DB::table('mensajes')->where('id',$request->id)->update(['estatus'=>1]);
        $exito=true;
        return json_encode($request->all());
    }
    public function seguimiento(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array(
                'exp'=>\DB::select('select v.id_expediente,v.expediente,v.fechasis,v.id_razonsocial,v.Demandado,v.id_demandante,v.Demandante,v.Resumen,e.serie from v_seguimiento v join expediente e on v.id_expediente=e.id'),
                'rol'=>'oficialpartes',
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
                'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
            );
       //dd($data);
    	return view('oficialpartes.seguimiento',$data);
    }
    public function getseguimiento(Request $request){
        // return json_encode($request->all());
        $data=array('anexos'=>\DB::table('trackseguimiento')->where('id',$request->exp)->get());
        return json_encode($data);
    }
    public function getd(Request $request){
        $usuario=\DB::table('v_usuarios as u')->join('role_user as r','u.id','r.user_id')->select('u.id','u.nombre','u.razon_social')->where('u.id',$request->id)->first();
        return json_encode($usuario);
    }
    public function nuevousuario(Request $request){
        if($_POST){
            if($request->dom2 != null){
                if($request->tipoc==1){
                    //insertar usuario junto con el rol
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Usuario')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                     //insertar datos de persona
                    $per=persona::create(['user_id'=>$id,'curp'=>null,'telefono'=>$request->tel,'celular'=>$request->cel,'TipodePersona'=>'Fisica','razon_social'=>null,'curp'=>$request->curp]);
                     //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>0]);
                    $d2=direccion::create(['user_id'=>$id,'calle'=>$request->calle2,'ninter'=>$request->n_int2,'next'=>$request->n_ext2,'colonia'=>$request->colonia2,'localidad'=>$request->localidad2,'municipio'=>$request->municipio2,'estado'=>"Colima",'cp'=>$request->cp2,'referencia'=>$request->referencia2,'oir'=>1]);
                    return back()->with('exito',true);
                 } else if($request->tipoc==2){
                     //insertar usuario junto con el rol
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Usuario')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                     //insertar datos de persona
                    $per=persona::create(['user_id'=>$id,'curp'=>null,'telefono'=>$request->tel,'celular'=>$request->cel,'TipodePersona'=>'Moral','razon_social'=>$request->razons,'curp'=>$request->curp]);
                     //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>0]);
                    $d2=direccion::create(['user_id'=>$id,'calle'=>$request->calle2,'ninter'=>$request->n_int2,'next'=>$request->n_ext2,'colonia'=>$request->colonia2,'localidad'=>$request->localidad2,'municipio'=>$request->municipio2,'estado'=>"Colima",'cp'=>$request->cp2,'referencia'=>$request->referencia2,'oir'=>1]);
                    return back()->with('exito',true);
                }else if($request->tipoc==3){
                    //insertar usuario junto con el rol
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Institución')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                    //insertar datos de institucion
                  
                    $inst=institucion::create(['user_id'=>$id,'razon_social'=>$request->razons,'telefono'=>$request->tel,'celular'=>$request->cel]);
                    //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>0]);
                    $d2=direccion::create(['user_id'=>$id,'calle'=>$request->calle2,'ninter'=>$request->n_int2,'next'=>$request->n_ext2,'colonia'=>$request->colonia2,'localidad'=>$request->localidad2,'municipio'=>$request->municipio2,'estado'=>"Colima",'cp'=>$request->cp2,'referencia'=>$request->referencia2,'oir'=>1]);
                    return back()->with('exito',true);
                }
            }
            else{
                if($request->tipoc==1){
                    //insertar usuario junto con el rol
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Usuario')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                     //insertar datos de persona
                    $per=persona::create(['user_id'=>$id,'curp'=>null,'telefono'=>$request->tel,'celular'=>$request->cel,'TipodePersona'=>'Fisica','razon_social'=>null,'curp'=>$request->curp]);
                     //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>1]);
                    return back()->with('exito',true);
                }else if($request->tipoc==2){
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Usuario')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                     //insertar datos de persona
                    $per=persona::create(['user_id'=>$id,'curp'=>null,'telefono'=>$request->tel,'celular'=>$request->cel,'TipodePersona'=>'Moral','razon_social'=>$request->razons,'curp'=>$request->curp]);
                     //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>1]);
                    return back()->with('exito',true);
                }else if($request->tipoc==3){
                    $user = User::create(['nombre' =>$request->nombre,'a_paterno'=>$request->a_paterno,'a_materno'=>$request->a_materno,'email' => $request->email,'password' => bcrypt($request->password),'avatar'=>'/img/basic/avatar.png']);
                    $user->roles()->attach(Role::where('nombre','Institución')->first());
                    $id=\DB::table('users')->select('id')->where('email',$request->email)->first();
                    $id=$id->id;
                    //insertar datos de institucion
                  
                    $inst=institucion::create(['user_id'=>$id,'razon_social'=>$request->razons,'telefono'=>$request->tel,'celular'=>$request->cel]);
                    //insertar domicilios
                    $d1=direccion::create(['user_id'=>$id,'calle'=>$request->calle,'ninter'=>$request->n_int,'next'=>$request->n_ext,'colonia'=>$request->colonia,'localidad'=>$request->localidad,'municipio'=>$request->municipio,'estado'=>"Colima",'cp'=>$request->cp,'referencia'=>$request->referencia,'oir'=>1]);
                    return back()->with('exito',true);
                }
            }
            
    	  }
        else{
            $id=$request->session()->get('id');
            $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
            $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
            return view('oficialpartes.usuarios.nusuario',$data);
        }
    }
    public function buscausuario(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $sraw=\DB::raw("u.id,u.nombre,u.a_paterno,u.a_materno,u.email");
        $data=array( 'usuarios'=>\DB::table('v_usuarios as u')->join('users as b','b.id','u.id')->join('role_user as ru','ru.user_id','u.id')->select('u.id','u.Nombre','u.razon_social','b.email')->where('ru.role_id','=','7')->orwhere('ru.role_id','=','9')->paginate(10),
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
               );
        //dd($data);
    	return view('oficialpartes.usuarios.busqueda',$data);
    }
    public function nuevademanda(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $ex=\DB::table('expediente')->select('expediente')->orderby('id','desc')->first();
        if($ex==null){
            $ex=0;
        }else{
            $ex=$ex->expediente;
        }
        $data=array('exp'=>$ex,'serie'=>date('Y'),'tipodem'=>\DB::table('tipoexpediente')->get(),'tipodocumento'=>\DB::table('acuerdotipo')->select('id','Tipo')->where('nivel',1)->where('estatus','<>',0)->orderby('Tipo','ASC')->get(), 'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
        return view('oficialpartes.demanda.nueva',$data);
    }
    public function perfil($id,Request $request){
        if($_POST){
           //dd($request->all());
            $user=\DB::table('users')->where('id',$id)->first();
            $email=$request->email2;
            $contra=$request->pasword;
            if($request->hasFile('file')){$archivo=1;}else{$archivo=0;}   
            if($email==$user->email){
                //no se actualiza el email
                if($archivo==1){
                    if($contra==null){
                        $imagen=$request->file('file');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$request->id)->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }else{
                        $imagen=$request->file('file');
                        $avatar=filehelper::uploadpic($imagen,$id);
                        $usuario=\DB::table('users')->where('id',$request->id)->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }
                }else{
                    if($contra==null){
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }else{
                        $avatar=\DB::table('users')->select('avatar')->where('id',$request->id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }
                        
                }
            }else{
                //se actualiz el email
                if($archivo==1){
                    if($contra==null){
                        $imagen=$request->file('file');
                        $avatar=filehelper::uploadpic($imagen,$id);
                         $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }else{
                        $imagen=$request->file('file');
                        $avatar=filehelper::uploadpic($imagen,$id);
                         $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }
                        
                }else{
                    if($contra==null){
                        $avatar=\DB::table('users')->select('avatar')->where('id',$id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }else{
                        $avatar=\DB::table('users')->select('avatar')->where('id',$id)->first();
                        $avatar=$avatar->avatar;
                        $usuario=\DB::table('users')->where('id',$request->id)
                               ->update(['nombre'=>$request->nombre2,'a_paterno'=>$request->a_paterno2,'a_materno'=>$request->a_materno2,'email'=>$request->email2,'password'=>bcrypt($request->password),'avatar'=>$avatar]);
                        return back()->with('exito',true);
                    }
                            
                }
            }
        }else{
            $id=$request->session()->get('id');
            $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
            $raw=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno)as Nombreusuario");
            $data=array(
            'usuario'=>\DB::table('users as u')->join('role_user as ru','ru.user_id','u.id')->join('roles as r','ru.role_id','r.id')->select('u.id',$raw,'u.nombre','u.a_paterno','u.a_materno','u.avatar','r.descripcion','u.email')->where('u.id',$id)->first(),
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
                'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get()
            );
             //dd($data);
            return view('perfil',$data);
        }
    }
    public function gettipo(){
        $data=\DB::table('acuerdotipo')->where('nivel',1)->where('estatus','<>',0)->where('id','<>',15)->select('id','Tipo')->orderby('Tipo','ASC')->get();
        return json_encode($data);
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
        return json_encode($data);
    }
    public function registrodemanda(Request $request){
        $folio=$request->exp;
        $fecha=date("Y-m-d H:i:s");
        $usuario=$request->id_usuario;
        // Almacenar expediente
        $exp=new expediente;
        $exp->id_usuario=$usuario;
        $exp->id_demandante=$request->id_demandante;
        $exp->id_demandado=$request->id_demandado;
        $exp->expediente=$folio;
        $exp->descripcion=$request->observaciones;
        $exp->status=1;
        $exp->fecha=$fecha;
        $exp->serie=$request->serie;
        $exp->idtipo=$request->tipodemanda;
        $exp->save();
        $id_exp=$exp->id;
        $expediente=$exp->expediente;
        // almacenar seguimiento de la demanda;
        $seg=new seguimiento;
        $seg->fecha=$fecha;
        $seg->id_modulo=2;
        $seg->id_persona=$request->id_usuario;
        $seg->movimiento='Entrada';
        $seg->id_exp=$id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=2;
        $seg->comentarios=$request->observaciones;
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
        $tam=sizeof($request->file);
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
            $seg->id_modulo=2;
            $seg->id_persona=$request->id_usuario;
            $seg->movimiento='insitu';
            $seg->id_exp=$id_exp;
            $seg->id_anexo=$anexo->id;
            $seg->id_Tseguimiento=15;
            $seg->comentarios="Anexo de documento ";
            $seg->save();
        }
        $m=new mensajes;
        $m->usuario_origen=$usuario;
        $m->usuario_destino=$usuario;
        $m->mensaje="Se ha registrado el Expediente ".$expediente.'/'.$request->serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        return back()->with('exito',true);
    }
    public function searchd1(Request $request){
        if($request->rol==7){
            $raw=\DB::raw('distinct v.id');
            $data=\DB::table('v_usuarios as v')->join('role_user as r','r.user_id','v.id')->select($raw,'v.nombre','v.razon_social')->where('r.role_id',$request->rol)->where('v.nombre','like',"%".$request->busqueda."%")->get();
            return json_encode($data);
        }else{
        $data=\DB::table('v_usuarios as v')->join('role_user as r','r.user_id','v.id')->select('v.id','v.nombre','v.razon_social')->where('r.role_id',$request->rol)->where('v.razon_social','like',"%".$request->busqueda."%")->get();
        return json_encode($data);
        }
    }
    public function search1(Request $request){
        $data=\DB::table('v_usuarios as v')->join('users as u','u.id','v.id')->select('v.id','v.Nombre','u.email')->where('v.Nombre','like','%'.$request->buscar.'%')->get();
        return json_encode($data);
    }
    public function search2(Request $request){
        $data=\DB::table('v_usuarios')->select('id','nombre','razon_social')->where('razon_social','like','%'.$request->buscar.'%')->get();
        return json_encode($data);
    } 
    public function search3(Request $request){
        $exp=$request->buscar;
        $b1=\DB::table('expediente')->select('id_demandante')->where('expediente',$exp)->first();
        if($b1==null){
            return json_encode(null);
        }else{
            $b1=$b1->id_demandante;
            $b2=\DB::table('expediente')->select('id_demandado')->where('expediente',$exp)->first();
            if($b2==null){
                return json_encode(null);
            }else{
                $b2=$b2->id_demandado;
                $data=\DB::table('v_usuarios as v')->join('users as u','u.id','v.id')->select('v.id','v.Nombre','v.razon_social','u.email')->where('v.id',$b2)->orwhere('v.id',$b1)->get();
                 return json_encode($data);
            }
        }
    }
    public function search4(Request $request){
        $tipo=\DB::table('role_user')->select('role_id')->where('user_id',$request->id)->first();
        $tipo=$tipo->role_id;
        if($tipo==7){
            $data=array(
                'tipo'=>$tipo,
                'usuario'=>\DB::table('users')->select('nombre','a_paterno','a_materno','email')->where('id',$request->id)->first(),
                'persona'=>\DB::table('persona')->select('curp','telefono','celular','razon_social')->where('user_id',$request->id)->first(),
                'domicilio'=>\DB::table('domicilio')->select('calle','ninter','next','colonia','municipio','estado','localidad','cp','referencia')->where('user_id',$request->id)->where('oir',1)->first(),
                );
            return json_encode($data);
        }else{
            $data=array(
                'tipo'=>$tipo,
                'usuario'=>\DB::table('users')->select('nombre','a_paterno','a_materno','email')->where('id',$request->id)->first(),
                'institucion'=>\DB::table('institucion')->select('telefono','celular','razon_social')->where('user_id',$request->id)->first(),
                'domicilio'=>\DB::table('domicilio')->select('calle','ninter','next','colonia','municipio','estado','localidad','cp','referencia')->where('user_id',$request->id)->where('oir',1)->first(),
                );
            return json_encode($data);
        }
    }
    public function updateuser(Request $request){
        $user=['nombre'=>$request->nombre,'a_paterno'=>$request->apat,'a_materno'=>$request->amat,'email'=>$request->email];
        $usuario=\DB::table('users')->where('id',$request->id)->update($user);
        if($request->tipo==7){
            $per=['curp'=>$request->curp,'telefono'=>$request->tel,'celular'=>$request->cel,'razon_social'=>$request->razon];
            $persona=\DB::table('persona')->where('user_id',$request->id)->update($per);
        }else{
            $inst=['razon_social'=>$request->razon,'telefono'=>$request->tel,'celular'=>$request->cel];
            $institucion=\DB::table('institucion')->where('user_id',$request->id)->update($inst);
        }
        $dir=['calle'=>$request->calle,'ninter'=>$request->nint,'next'=>$request->next,'colonia'=>$request->colonia,'estado'=>'Colima','localidad'=>$request->localidad,'municipio'=>$request->municipio,'cp'=>$request->cp,'referencia'=>$request->ref];
        $domicilio=\DB::table('domicilio')->where('user_id',$request->id)->update($dir);
        $data=\DB::table('v_usuarios')->select('Nombre')->where('id',$request->id)->first();
        return json_encode($data);
    }
    public function enviar(Request $request){
        $fecha=$request->fecha;
        $fecha1= date("Y-m-d H:i:s", strtotime("$fecha"));
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=2;
        $seg->id_persona=$request->id_log;
        $seg->movimiento='Salida';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=3;
        $seg->comentarios=$request->obs;
        $seg->save();
        $seg=new seguimiento;
        $seg->fecha=$fecha1;
        $seg->id_modulo=3;
        $seg->id_persona=$request->id_sa;
        $seg->movimiento='Entrada';
        $seg->id_exp=$request->id_exp;
        $seg->id_anexo=null;
        $seg->id_Tseguimiento=3;
        $seg->comentarios=$request->obs;
        $seg->save();
        $env=new envios;
        $env->id_exp=$request->id_exp;
        $env->id_envio=$request->id_log;
        $env->id_receptor=$request->id_sa;
        $env->fecha=date('Y-m-d H:i:s');
        $env->save();
        $exp=\DB::table('expediente')->where('id',$request->id_exp)->update(['status'=>2]);
        $usuario=\DB::table('users')->where('id',$request->id_sa)->first();
        $expediente=\DB::table('expediente')->select('expediente','serie')->where('id',$request->id_exp)->first();
        $data=['nombre'=>$usuario->nombre,'a_paterno'=>$usuario->a_paterno,'a_materno'=>$usuario->a_materno,'expediente'=>$expediente->expediente];
        $m=new mensajes;
        $m->usuario_origen=2;
        $m->usuario_destino=2;
        $m->mensaje="Enviaste el Exp. ".$expediente->expediente."/".$expediente->serie." al Secretario  ".$usuario->nombre." ".$usuario->a_paterno." ".$usuario->a_materno;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
        $m=new mensajes;
        $m->usuario_origen=2;
        $m->usuario_destino=$request->id_sa;
        $m->mensaje="Se te ha asignado el Expediente ".$expediente->expediente.'/'.$expediente->serie;
        $m->estatus=0;
        $m->created_at=date('Y-m-d H:i:s');
        $m->updated_at=null;
        $m->save();
       return json_encode($data);            
    }
    public function add_file(Request $request){
        $id=$request->expediente;
        $raw=\DB::raw('count(Folio) as cantidad');
        $folio=\DB::table('anexopdf')->select($raw)->where('id_Expediente',$id)->first();
        $exp=\DB::table('expediente')->select('expediente','serie')->where('id',$id)->first();
        $serie=$exp->serie;
        $exp=$exp->expediente;
        $folio=$folio->cantidad;
        $archivo=$request->pdf_file;
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
        $seg->id_modulo=2;
        $seg->id_persona=2;
        $seg->movimiento='insitu';
        $seg->id_exp=$id;
        $seg->id_anexo=$anexo->id;
        $seg->id_Tseguimiento=15;
        $seg->comentarios=$request->observaciones;
        $seg->save();
        return redirect('oficialpartes/demanda')->with('exito2',true);
    }
    public function getusedmails(Request $request){
        $data=\DB::table('users')->select('id')->where('email',$request->busqueda)->first();
        if($data==null){
            $data=array('id'=>0);
            return json_encode($data);
        }else
        return json_encode($data);
    }
    public function resdocumento(Request $request){
        //return json_encode($request->all());
       if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>1])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function deldocumento(Request $request){
        //return json_encode($request->all());
        if($d=\DB::table('acuerdotipo')->where('id',$request->id)->update(['estatus'=>0])){
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
       }
    }
    public function adddocumento(Request $request){
        //return json_encode($request->all());
        $a=new acuerdotipo;
        $a->Tipo=$request->tipo;
        $a->Descripcion=" ";
        $a->nivel=1;
        $a->estatus=1;
        $a->save();
        $data=array('mensaje'=>"El tipo de documento se reestablecio de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->get());
        return json_encode($data);
    }
    public function gettipodoc(Request $request){
        $d=\DB::table('acuerdotipo')->select('Tipo')->where('id',$request->id)->first();
        $d=$d->Tipo;
        return json_encode($d);
    }
    public function actualizartipo(Request $request){
        if($a=\DB::table('acuerdotipo')->where('id',$request->id)->update(['Tipo'=>$request->tipo])){
            $data=array('mensaje'=>"El tipo de documento se actualizó de forma correcta",'estatus'=>1,'tipoac'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',1)->select('id','Tipo')->orderby('Tipo','ASC')->get(),'tipoac2'=>\DB::table('acuerdotipo')->where('nivel',1)->where('estatus',0)->select('id','Tipo')->orderby('Tipo','ASC')->get());
            return json_encode($data);
        }
    }
}
