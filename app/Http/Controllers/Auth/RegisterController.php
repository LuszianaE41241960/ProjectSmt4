<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Show register form
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle register (TIDAK AUTO LOGIN)
     */
    public function register(Request $request)
    {
        // validasi
        $this->validator($request->all())->validate();

        // simpan user
        $this->create($request->all());

        // redirect ke login (TANPA LOGIN OTOMATIS)
        return redirect('/login')->with('success', 'Register berhasil, silakan login');
    }

    /**
     * Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create user
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
