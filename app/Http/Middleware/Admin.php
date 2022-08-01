<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! auth()->guest()){
            $nip = Auth::user()->nip;
            $user = User::where('NIP',$nip)->first();
            $role = Role::where('ROLE', 'Admin')->first();
            if($user->ID_ROLE == $role->ID_ROLE){
                return $next($request);
            }
            return back();
        }
        return back();
    }
}
