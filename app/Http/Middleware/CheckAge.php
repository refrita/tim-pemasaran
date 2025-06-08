<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if ($request->age <= 17) {
            return response('Maaf, Anda belum cukup umur.', 403);
        }

        return $next($request);
    }
}
