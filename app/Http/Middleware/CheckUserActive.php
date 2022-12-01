<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->is_active) {
            return $next($request);
        }

        auth()->logout();
        return redirect('verification')
            ->with(['error' => "You do not have the permission to enter this site. Please login with correct user."]);
    }
}
