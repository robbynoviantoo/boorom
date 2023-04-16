<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Role Admin
            if(Auth::user()->role == "ADMIN"){
                return $next($request);
            } else if(Auth::user()->role == "USER") {
                return redirect('/user')->with('message', 'Bukan Admin!');
            }
        } else{
            return redirect('/admin')->with('message', 'Bukan Admin!');
        }

        return $next($request);
    }
}
