<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }


    public function loginproses(Request $request){
        $credentials = $request->only('nik', 'password');
    
        if(Auth::attempt($credentials)){
            return redirect('/');
        }
        
        return redirect('login')->with('error', 'NIK atau password salah.');
    }
    

    

    public function register(){
        return view('auth.register');
    }

    public function registeruser(Request $request){
        //dd($request->all());
        User::create([
            'nama'=>$request->nama,
            'nik'=>$request->nik,
            'password'=>bcrypt($request->password),
            
        ]);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return \redirect('login');
    }

}
