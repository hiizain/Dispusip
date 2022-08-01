<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\User;
use Auth;
use Hash;


use App\Http\Requests;
use App\Http\Controllers\Auth\AuthController;
use Error;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
        ]);

        // $credentials = $request->validate([
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);

        $password = Hash::make($request->password);

        $credentials = $request->only('nip', 'password');

        // dd($credentials);
        $nip = $request->nip;

        $userFound = User::where('nip', $nip)->first();
        if ($userFound->role->ROLE === "Admin"){
            // echo "Admin";
            if (Auth::attempt($credentials)) {
            // if (Auth::attempt(['nip' => $nip, 'password' => $password])) {
                // Authentication passed...
                // echo "Admin";
                $request->session()->regenerate();
                return redirect()->intended('/admin-barang');
            // } else echo "Admin Gagal";
            } else return back()->with('tambahError', 'Login gagal');
        } else if ($userFound->role->ROLE === "Petugas"){
            // echo "Petugas";
            if (Auth::attempt($credentials)) {
            // if (Auth::attempt(['nip' => $request->nip, 'password' => $password])) {
                // Authentication passed...
                $request->session()->regenerate();
                return redirect()->intended('/petugas-lokasi');
                // return redirect()->intended('/petugas-lokasi');
            // } else echo "Petugas Gagal";
            } else return back()->with('tambahError', 'Login gagal');
        } 
    }

    public function logout()
    {
        if (Auth::logout()) {
            return redirect('/');
        }
    }

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


