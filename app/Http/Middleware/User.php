<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        switch (Auth::user()->role_id) {
            case 1:
                return redirect('/admin/dashboard');
                break;
            case 2:
                return redirect('/admin/dashboard');
                break;
            case 3:
                return redirect('/mitra/dashboard');
                break;
            case 4:
                return $next($request);
                break;
        }
        
    }
}
