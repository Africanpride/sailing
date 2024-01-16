<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Jetstream\Agent;
use Symfony\Component\HttpFoundation\Response;

class DetectMobile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        $isMobile = $agent->isMobile();
        view()->share('isMobile', $isMobile);
        return $next($request);
    }
}
