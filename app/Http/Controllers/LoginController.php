<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    //

    
    public function login()
    {
        return view('login');
    }
    public function auth(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       $user = $request->only(['email', 'password']); 
       if(Auth::attempt($user)){
            return redirect('/dashboard')->with('Islogin','kamu sudah login');
        }else {
            return redirect('/login')->back()->with('failed','Failed Login!');
        }        
    }

        public function dashboard()
        {   
            return view('dashboard');
        }

    public function register()
    {
        return view('register');
    }
    public function regis(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns',
            'alamat'=> 'required',
            'no_hp' => 'required|min:10',
            'password' => 'required|min:4',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => 'User'
        ]);

        return redirect('/login')->with('success', 'Berhasil menambahkan akun! silahkan login!');
    }


    public function read()
    {
        return view('read');
    }
}

