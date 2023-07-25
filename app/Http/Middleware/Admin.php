<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
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
                return $next($request);
                break;
            case 2:
                return $next($request);
                break;
            case 3:
                return redirect('/mitra/dashboard');
                break;
            case 4:
                return redirect('/dashboard');
                break;
        }
    }
}