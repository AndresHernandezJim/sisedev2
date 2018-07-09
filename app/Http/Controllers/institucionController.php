<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class institucionController extends Controller
{
     public function index(Request $request){
        $id=$request->session()->get('id');
        $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
        $data=array(
            'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
        );
    	return view('home',$data);
    }
    public function perfil($id,Request $request){
        if($_POST){
           
        }else{
            $id=$request->session()->get('id');
            $ca=\DB::table('mensajes')->select(\DB::raw("count(id) as cantidad"))->where('usuario_destino',$id)->where("estatus",0)->first();
            $dom=\DB::table('domicilio')->where('user_id',$id)->where('oir',1)->first();
            $per=\DB::table('institucion')->where('user_id',$id)->first();
            $raw=\DB::raw("concat(nombre,' ',a_paterno,' ',a_materno)as nombreusuario");
            $usuario=\DB::table('users')->select('id','nombre','a_paterno','a_materno','avatar','email',$raw)->where('id',$id)->first();
            $data=array(
                'mensajes'=>\DB::table('mensajes')->where('usuario_destino',$id)->orderby('id','desc')->get(),'cant'=>$ca->cantidad,
                'dom'=>$dom,'persona'=>$per,'usuario'=>$usuario,'tipo'=>"institucion"
            ); 
            // dd($data);
            return view('other.perfil',$data);
        }
    }
}
