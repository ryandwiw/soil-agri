<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) : response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            return $next($request);
        }

        // Redirect or show error message for unauthorized access
        // return redirect()->route('/')->with('error', 'Access denied. Please login.');
        return redirect('/')->with('error', 'Maaf Hanya admin yang bisa mengakses Ini !!')->with('modal', 'error');
    }
}
