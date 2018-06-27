<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;

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
        dd($data);
        
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'a_paterno' => 'required|string|max:255',
            'a_materno' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
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
        return $user;
    }
}
