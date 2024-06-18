<?php

namespace App\Http\Middleware;

use Closure;

class TrainerMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->hasRole('trainer')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
