<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class AdminCMSCheck extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken() == env('API_TOKEN')) {
            return $next($request);
        }

        return $this->responseHelper->response(false, 'Need to be admin', [], 400);
    }
}
