<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Banned
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isBanned) {
            Log::info('Banned user attempted access:', ['user_id' => Auth::id()]);

            auth()->guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with('banned', 'Your account has been suspended due to terms violation. Please contact support@costrad.org with subject "Account Banned" for assistance.');

                // ->with('banned', 'Your account has been banned due to terms violation. If you believe this was done in error, please contact us via email with the subject "Account Banned."');


        }

        return $next($request);
    }
}
