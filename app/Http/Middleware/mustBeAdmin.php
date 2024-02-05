<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class mustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request);
        }
        app('flasher')->addWarning('UNAUTHORIZED REQUEST.', 'Logging Details');
        // return response()->json(['redirect' => '/'], Response::HTTP_UNAUTHORIZED);
        return redirect()->route('home');
    }
}
