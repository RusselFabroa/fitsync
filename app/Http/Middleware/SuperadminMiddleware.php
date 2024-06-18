<?php

namespace App\Http\Middleware;

use Closure;

class SuperadminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->hasRole('superadmin')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
