<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string', 'max:255'],
            'rut' => ['required', 'string', 'max:12', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'apellido_p' => ['required', 'string', 'max:255'],
            'apellido_m' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'direccion'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'rut' => $data['rut'],
            'name' => $data['name'],
            'apellido_p' => $data['apellido_p'],
            'apellido_m' => $data['apellido_m'],
            'sexo' => $data['sexo'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'direccion' => $data['direccion'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
