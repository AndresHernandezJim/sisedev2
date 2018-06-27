<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class magistradoController extends Controller
{
    //
    public function index(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array('mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad);
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
    public function crear(){
    	$data=array(
    		'tipo'=>\DB::table('roles')->select('id','nombre')->where('id','<>','7')->where('id','<>','6')->where('id','<>','1')->get(),
    	);
    	//dd($data);
    	return view('magistrado.usuarios.registro',$data);
    }
    public function search(){
    	return view('magistrado.usuarios.busqueda');
    }
    public function registro(Request $request){
    	dd($request->all());
    }
    
    public function demandas(){
        $raw1=\DB::raw("concat(d.nombre,' ',d.a_paterno,' ',d.a_materno) demandante");
        $raw2=\DB::raw("concat(d1.nombre,' ',d1.a_paterno,' ',d1.a_materno) demandado");
        $raw3=\DB::raw('date(e.fecha) as fecha');
        $raw4=\DB::raw("concat(u.nombre,' ',u.a_paterno,' ',u.a_materno) as Nombre");
        $data=array('exp'=>\DB::table('expediente as e')->join('users as d','d.id','e.id_demandado')->join('users  as d1','d1.id','e.id_demandante')->select('e.id','e.expediente',$raw3,$raw1,$raw2,'e.descripcion as resumen')->get(),
                  'tipodocumento'=>\DB::table('tipo_documento')->where('rol_usuario','2')->select('id','tipo')->get(),
                  'fecha'=>date('Y-m-d'),
                   'secretarios'=>\DB::table('users as u')->join('role_user as rs','u.id','rs.user_id')->select('u.id',$raw4)->where('rs.role_id','3')->get(),
                    'rol'=>'magistrado',
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
    

}
