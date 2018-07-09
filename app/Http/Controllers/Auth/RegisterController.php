<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\direccion;
use App\persona;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'a_paterno' => 'required|string|max:255',
            'a_materno' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'calle'=>'required',
            'next'=>'required',
            'colonia'=>'required',
            'municipio'=>'required',
            'cp'=>'required',
            'tipo_persona'=>'required'
        ]);
    }
    protected function create(array $data)
    {   
        $user = User::create([
            'nombre' => $data['nombre'],
            'a_paterno'=>$data['a_paterno'],
            'a_materno'=>$data['a_materno'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar'=>'/img/avatar.png'
        ]);
        $user->roles()->attach(Role::where('nombre', 'Usuario')->first());
        $dom=direccion::create([
            'user_id'=>$user->id,
            'calle'=>$data['calle'],
            'next'=>$data['next'],
            'colonia'=>$data['colonia'],
            'municipio'=>$data['municipio'],
            'estado'=>'Colima',
            'localidad'=>$data['localidad'],
            'cp'=>$data['cp'],
            'referencia'=>$data['referencias'],
            'oir'=>1
        ]);
        $per=persona::create([
            'user_id'=>$user->id,
            'curp'=>$data['curp'],
            'telefono'=>$data['tel'],
            'celular'=>$data['cel'],
            'TipodePersona'=>$data['tipo_persona'],
            'razon_social'=>$data['razon'],
        ]);
        return $user;
    }
}
