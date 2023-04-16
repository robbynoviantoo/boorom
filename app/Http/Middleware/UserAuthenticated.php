<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
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
            // Role User
            if(Auth::user()->role == "USER"){
                return $next($request);
            } else if(Auth::user()->role == "ADMIN"){
                return redirect('/admin')->with('message', 'Bukan User!');
            }
        } else{
            return redirect('/user')->with('message', 'Bukan User!');
        }

        return $next($request);
    }
}
