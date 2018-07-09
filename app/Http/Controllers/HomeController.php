<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(Request $request)
    {
        if($request->user()->authorizeRoles(['user', 'Administrador'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return view('home');
        }else if($request->user()->authorizeRoles(['user', 'Oficial de Partes'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/oficialpartes/home');
        }else if($request->user()->authorizeRoles(['user', 'Secretario de Acuerdos'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/secretarioacuerdo/home');
        }else if($request->user()->authorizeRoles(['user', 'Proyectista'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/proyectista/home');
        }else if($request->user()->authorizeRoles(['user', 'Actuario'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/actuario/home');
        }else if($request->user()->authorizeRoles(['user', 'Magistrado'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
             return redirect('/magistrado/home');
        }else if($request->user()->authorizeRoles(['user', 'Usuario'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/user/home');
        }else if($request->user()->authorizeRoles(['user', 'Amparos'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return view('home');
        }else if($request->user()->authorizeRoles(['user', 'Institución'])){
            $id=$request->user()->getid();
            $request->session()->put('id',$id);
            return redirect('/institucion/home');
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        return view('home');
    }*/
}
