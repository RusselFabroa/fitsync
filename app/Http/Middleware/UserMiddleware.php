<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->hasRole('user')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
