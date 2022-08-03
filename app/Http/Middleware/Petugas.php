<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Petugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! auth()->guest()){
            $nip = Auth::user()->nip;
            $user = User::where('nip',$nip)->first();
            // $role = Role::where('ROLE', 'Admin')->first();
            if($user->role->ROLE === "Petugas"){
            // if($user->ID_ROLE === $role->ID_ROLE){
                return $next($request);
            }
            // return back();
            // else dd($user);
            return back();
        }
        return back();
        // else return back();
        // else echo "Bukan petugas";
    }
}
