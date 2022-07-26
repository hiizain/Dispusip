<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Auth\AuthController;

class LoginController extends Controller
{
    // public function index()
    // {
    //     return view ('petugas.welcome', [
    //         'title'=> 'Login'
    //         ]);
    // }

    // public function authentication(Request $request)
    // {   
    //     $credentials = $request->validate([
    //         'nip'=>'required',
    //         'password'=>'required'
    //     ]);

    //     if(Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/petugas.welcome');
    //     }

    //     return back()->with('loginError', 'Login failed!');
    // }
    // public function index()
    // {
    //     $role=Auth::user()->role;
    //     if($role=='1'){
    //         return view('admin.welcome');
    //     }
    //     else{
    //         return view('petugas.lokasi');
    //     }
    // }
    public function postlogin(Request $request)
    {
        dd($request->all());
        // $nip = $request['nip'];
        // $password = $request['password'];
        // if(Auth::attempt(['nip' => $nip, 'password' => $password])){
        //     return redirect()->intended('/petugas-lokasi');
        // }
        // return redirect('/');
    }

    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'nip' => 'required',
    //         'password' => 'required'
    //     ]);
    
    //     dd('berhasil login!');
    // }
    
    // public function halamanadmin()
    // {
    //     return view('admin.welcome');
    // }
    
    // public function halamanpetugas()
    // {
    //     return view('petugas.welcome');
    // }
    

    
}


