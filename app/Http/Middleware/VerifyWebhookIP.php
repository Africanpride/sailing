<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhookIP
{

    protected $allowed_ips = [
        '52.31.139.75',
        '52.49.173.169',
        '52.214.14.220',
        '127.0.0.1',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        if (!in_array($ip, $this->allowed_ips)) {
            abort(403, 'Unauthorized IP address.');
        }

        return $next($request);
    }
}
