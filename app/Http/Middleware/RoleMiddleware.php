<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | USER LOGIN CHECK
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {
            return redirect()->route('login');
        }


        /*
        |--------------------------------------------------------------------------
        | ROLE CHECK
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role !== $role) {

            /*
            | Admin
            */

            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }


            /*
            | Client
            */

            if (auth()->user()->role === 'client') {
                return redirect()->route('client.dashboard');
            }


            /*
            | Unknown role
            */

            auth()->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login');
        }


        return $next($request);
    }
}